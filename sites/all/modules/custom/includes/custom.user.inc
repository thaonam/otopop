<?php 
/**
 * @file Custom user functions handler.
 */

/**
 * Create a new user.
 */
function custom_user_create($name, $pass, $mail, $status, $role = null) {
  $account = array(
    'name' => $name,
    'pass' => $pass,
    'mail' => $mail,
    'status' => $status,
    'init' => $mail,
    'roles' => array(
      DRUPAL_AUTHENTICATED_RID => 'authenticated user',
    ),
  );
  
  // Assign role if available.
  // $role = array('rid' => $rid, 'value' => $value);
  if (is_array($role)) {
    $account['roles'][$role['rid']] = $role['value'];
  }
  
  return user_save('', $account);
}

/**
 * Geocode update.
 */
function custom_user_geocode_update($uid, $nid, $lat, $lon) {
  $node = node_load($nid);
  if (!$node) {return false;}

  $node->field_geocode[LANGUAGE_NONE][0] = array(
		'geom' => "POINT ($lon $lat)",
		'geo_type' => 'point',
		'lat' => $lat . "000000",
		'lon' => $lon . "000000",
		'left' => $lon . "000000",
		'top' => $lat . "000000",
		'right' => $lon . "000000",
		'bottom' => $lat . "000000"
  );

  node_save($node);
  return true;
}

/**
 * Update user password.
 */
function custom_user_password_update($uid, $pass, $old_pass = '') {
  $account = user_load($uid);
  if (!$account) {
    return array('is_error' => true, 'message' => t('User account not found.'));
  }
  
  // Validate user pass.
  if ($old_pass != '') {
    if (!user_authenticate($account->name, $old_pass)) {
      return array('is_error' => true, 'message' => t('Current password is not valid.'));
    }
  }

  if ($account) {
    $edit = array();
    $edit['pass'] = $pass;
    user_save($account, $edit);

    return array('is_error' => false, 'message' => t('Password changed successfully.'));
  }
  
  return array('is_error' => true, 'message' => t('Unknown error.'));
}

/**
 * Generate user password - copied from Drupal.org.
 */
function custom_user_password($length = 10, $allowable_characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789') {
  // Zero-based count of characters in the allowable list:
  $len = strlen($allowable_characters) - 1;

  // Declare the password as a blank string.
  $pass = '';

  // Loop the number of times specified by $length.
  for ($i = 0; $i < $length; $i++) {
    do {
      // Find a secure random number within the range needed.
      $index = ord(drupal_random_bytes(1));
    } while ($index > $len);

    // Each iteration, pick a random character from the
    // allowable string and append it to the password:
    $pass .= $allowable_characters[$index];
  }

  return $pass;
}

/**
 * Create a new user account by data.
 * Mostly being used for social login account.
 * E-mail must exist in the $account_fields.
 */
function custom_user_create_by_data($account_fields) {
  // Check for username / email existance.
  $email = strtolower($account_fields['email']);
  $name = isset($account_fields['name']) ? strtolower($account_fields['name']) : $email;

  // Create a valid and unique username.
  if (module_exists('email_registration')) {
    $name = email_registration_cleanup_username($name);
    $name = email_registration_unique_username($name);
  }

  $uid = db_query("SELECT uid FROM {users} WHERE mail=:mail OR name=:name", array(':mail' => $email, 'name' => $name))->fetchColumn();
  if ($uid) {
    return array('uid' => 0, 'message' => t('E-mail or username does exist.'));
  }
  
  // Check mobile phone, must be unique also.
  if (isset($account_fields['field_mobile_number']) and isset($account_fields['field_mobile_number']['value'])) {
    $check_mobile = views_get_view_result('drupalapp_user_functions', 'block_1', $account_fields['field_mobile_number']['value']);
    if (!empty($check_mobile)) {
      return array('uid' => 0, 'message' => t('Mobile number does exist. Please try to reset your password'));
    }
  }

  // Set up the user fields.
  $fields = array(
    'name' => $name,
    'mail' => $account_fields['email'],
    'pass' => isset($account_fields['password']) ? $account_fields['password'] : custom_user_password(6),
    'status' => isset($account_fields['status']) ? $account_fields['status'] : 1,
    'init' => $account_fields['email'],
    'roles' => array(
      DRUPAL_AUTHENTICATED_RID => 'authenticated user',
    ),
  );
  
  // If register from social network, we need the pass to be returned to send to user later.
  $password = '';
  if (!isset($account_fields['password'])) {
    $password = $fields['pass'];
  }
  
  if (isset($account_fields['field_full_name'])) {
    $fields['field_full_name'][LANGUAGE_NONE][0]['value'] = $account_fields['field_full_name']['value'];
  }

  if (isset($account_fields['first_name']) and $account_fields['first_name'] != '') {
    if ($account_fields['first_name'] != '') {
      $fields['field_full_name'][LANGUAGE_NONE][0]['value'] = $account_fields['first_name'];
    }
    
    if ($account_fields['last_name'] != '') {
      $fields['field_full_name'][LANGUAGE_NONE][0]['value'] .= $account_fields['first_name'] != '' ? ' ' . $account_fields['last_name'] : $account_fields['last_name'];
    }
  }

  if (isset($account_fields['gender']) and $account_fields['gender'] != '') {
    $fields['field_gender'][LANGUAGE_NONE][0]['value'] = $account_fields['gender'];
  }

  // Setup cover if presence.
  // This is for creating a user from social login.
  if (!empty($account_fields['cover']) and isset($account_fields['cover']['source']) and $account_fields['cover']['source'] != '') {
    $image_url = preg_split('/\?/', $account_fields['cover']['source']);
    if ($account_fields['caller'] == 'facebook') {
      $image = file_get_contents($account_fields['cover']['source']);
    }
    else{
      $image = file_get_contents($image_url[0]);
    }

    if ($image) {
      $filepath_public = 'public://user-photos';
      $image_name = basename($image_url[0]);
      $file = file_save_data($image, $filepath_public . '/' . $image_name, FILE_EXISTS_RENAME);
      image_path_flush($file->uri);

      $file->status = 1;
      file_save($file);
      
      if ($file->fid) {
        $fields['field_photo'][LANGUAGE_NONE][0] = (array) $file;
      }
    }
  }
  
  $user = user_save('', $fields);

  return array('uid' => $user->uid, 'pass' => $password, 'message' => t('Account has been created.'));
}

/**
 * Update an existing user account.
 * $account_fields contains fields used in the update.
 * $account_fields['field_name']['value'] = value.
 * 
 * Invention for speical fields:
 * $account_fields = array('email', 'name', 'password');
 */
function custom_user_store($uid, $account_fields) {
  // Create a new user if 0 is given.
  $is_new = $uid > 0 ? false : true;
  if ($is_new) {
    $result = custom_user_create_by_data($account_fields);
    if (!$result['uid']) {
      $result['is_error'] = true;
      return $result;
    }
    
    $uid = $result['uid'];
  }
  
  // Load the account for adding more field values.
  $account = user_load($uid);
  $edit = array();

  // Validate inputs.
  if (!$account or !$account->uid) {
    return array('is_error' => true, 'uid' => 0, 'message' => t('User account not found.'));
  }

  // Lower username / email for validation purpose.
  if (isset($account_fields['name'])) {
    $account_fields['name'] = strtolower($account_fields['name']);
  }
  if (isset($account_fields['email'])) {
    $account_fields['email'] = strtolower($account_fields['email']);
  }

  // If username changed, validate existance.
  if (!$is_new and isset($account_fields['name']) and $account->name != $account_fields['name']) {
    $uid = db_query("SELECT uid FROM {users} WHERE name=:name", array(':name' => $account_fields['name']))->fetchColumn();
    if ($uid) {
      return array('is_error' => true, 'uid' => 0, 'message' => t('Username does exist.'));
    }
  }

  if (!$is_new and isset($account_fields['email']) and $account->mail != $account_fields['email']) {
    $uid = db_query("SELECT uid FROM {users} WHERE mail=:mail", array(':mail' => $account_fields['email']))->fetchColumn();
    if ($uid) {
      return array('is_error' => true, 'uid' => 0, 'message' => t('E-mail address does exist.'));
    }
  }

  foreach ($account_fields as $field_name => $field_value) {
    // Handle special fields for updated cases.
    if ($field_name == 'email' and !$is_new) {
      if ($account->mail != $account_fields['email'] and filter_var($account_fields['email'], FILTER_VALIDATE_EMAIL)) {
        // Update user e-mail.
        $edit['mail'] = $field_value;
      }
    }
    else if ($field_name == 'password' and !$is_new) {
      // Update user password.
      $edit['pass'] = $field_value;
    }
    // Go through and take only fields those exist in user account fields.
    else if (isset($account->{$field_name})) {
      if (is_array($field_value)) {
        $edit[$field_name][LANGUAGE_NONE][0] = $field_value; // $field_value['value']
      }
      else if ($field_name == 'field_photo') {
        $file = file_load($field_value); // = fid.
        if ($file) {
          $file->status = 1;
          file_save($file);

          // Remove current file if exist.
          if (!empty($account->field_photo[LANGUAGE_NONE])) {
            drupal_unlink($account->field_photo[LANGUAGE_NONE][0]['uri']);
          }

          $edit['field_photo'][LANGUAGE_NONE][0] = (array) $file;
        }
      }
      else{
        $edit[$field_name] = $field_value;
      }
    }
  }

  // Save the changes and return new account.
  user_save($account, $edit);
  
  // Update image link.
  if (!empty($account->field_photo[LANGUAGE_NONE])) {
    $account->field_photo[LANGUAGE_NONE][0]['url'] = image_style_url('thumbnail', $account->field_photo[LANGUAGE_NONE][0]['uri']);
  }
  
  return array('is_error' => false, 'uid' => $account->uid, 'message' => t('User account has been updated.'), 'account' => $account);
}

/**
 * Login with social (FB / Google+) info. Can be used for other as well.
 * $data: An array of user data; requires: $data['email'].
 */
function custom_user_social_login($data) {
  // Collect data.
  $email = strtolower($data['email']);

  // Check if email does exists. If does, do login.
  $uid = db_query("SELECT uid FROM {users} WHERE LOWER(mail)=:mail", array(':mail' => $email))->fetchColumn();
  if (!$uid) {
    // Register this user with the email.
    $result = custom_user_create_by_data($data);
    if ($result['uid']) {
      $uid = $result['uid'];
      
      // Send the username / password to user via email for keeping.
      $account = user_load($uid);
      $account->plain_pass = $result['pass'];
      drupal_mail('custom', 'custom_user_create_social_confirm', $account->mail, language_default(), array('account' => $account), variable_get('site_mail', 'noreply@b.mx.sg'));
    }
  }

  if (!$uid) {return false;}

  // Auto login this user.
  global $user;
  $user = isset($account) ? $account : user_load($uid);
  drupal_session_regenerate();

  return $user;
}

/**
 * Do a smart login via username, email, or mobile number.
 */
function custom_account_smart_login($name, $password) {
  // $name can be anything.
  $name = strtolower($name);
  $username = '';
  $username_type = '';
  
  // If it is an email.
  if (filter_var($name, FILTER_VALIDATE_EMAIL)) {
    $username = db_query("SELECT name FROM {users} WHERE mail=:mail", array(':mail' => $name))->fetchColumn();
    
    if ($username) {
      $username_type = t('E-mail address');
    }
  }

  // If it is a mobile number.
  if ($username == '' or empty($username)) {
    $result = views_get_view_result('drupalapp_user_functions', 'block_1', $name);
    if (!empty($result)) {
      $username = $result[0]->users_name;
      $username_type = t('Mobile number');
    }
  }

  // If it is a username.
  if ($username == '') {
    // Must lah.
    $username = $name;
    $username_type = t('Username');
  }

  // Authenticate this account.
  $uid = user_authenticate($username, $password);
  if (!$uid) {
    return array('is_error' => true, 'message' => $username_type . ' ' . t('or password is incorrect. Please try again.'));
  }

  // Process to login.
  global $user;
  $user = user_load($uid);
  drupal_session_regenerate();

  // Return the username for login via App.
  return array('is_error' => false, 'message' => t('Login may be success.'), 'username' => strtolower($username), 'user' => $user, 'login_type' => $username_type);
}
