<?php 
/**
 * @file Custom mail functions handler.
 */

/**
 * Handler for all email messages.
 * $params['account'];
 */
function custom_mail_get_message($key, &$message, $params) {
  // Get site params.
  $site_name = variable_get('site_name', 'OTOPOP');
  $site_url = url('<front>', array('absolute' => true));

	switch($key) {
	  case 'custom_user_create_social_confirm':
      $body_message = "";
  		$body_message .= "Hi " . $params['account']->field_full_name[LANGUAGE_NONE][0]['value'] . ",\n\n";
      $body_message .= "Your account has been created via Facebook and can be used to login to " . $site_name . " now.\n\n";
      $body_message .= 'You can also login to Otopop using this account details:' . "\n\n";
      $body_message .= "Username: " . $params['account']->name . "\n";
      $body_message .= "Password: " . $params['account']->plain_pass . "\n\n";
      $body_message .= "--\n" . $site_name . "\n" . $site_url . "\n";

      $message['subject'] = '[' . $site_name . '] - Your account details';
      $message['body'][] = $body_message;
      break;
	}
}
