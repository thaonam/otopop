<?php /* Helper function to be used everywhere */

/*
 * Helper function to create a new term.
 */
function custom_term_create($vid, $name, $parent = 0) {
  $term = new stdClass();
  $term->vid = $vid;
  $term->name = $name;
  $term->parent = $parent;
  
  taxonomy_term_save($term);
  return $term->tid ? $term->tid : FALSE;
}

/*
 * Remove temporary images belong to a user.
 */
function custom_temp_files_remove($uid) {
  // Remove physical files.
  $result = db_query("SELECT fid, uri FROM {file_managed} WHERE uid=:uid AND status='0'", [':uid' => $uid]);
  foreach ($result as $row) {
    drupal_unlink($row->uri);
  }
  
  // Remove temp files in db.
  db_query("DELETE FROM {file_managed} WHERE uid=:uid AND status='0'", [':uid' => $uid]);
}

/*
 *  Function: Render [Array] List Uid Friends of User logined
 */
function custom_array_list_user_friends() {
  
  $list_friend = [];
  // Get 2 results.
  $creator_result = views_get_view_result('node_functions', 'block_31');
  $invitor_result = views_get_view_result('node_functions', 'block_32');
  
  // Merge 2 results to one.
  if (!empty($creator_result)) {
    foreach ($creator_result as $row) {
      if ($row->field_field_member) {
        $list_friend[] = $row->field_field_member[0]['raw']['target_id'];
      }
    }
  }
  if (!empty($invitor_result)) {
    foreach ($invitor_result as $row) {
      if ($row->node_uid) {
        $list_friend[] = $row->node_uid;
      }
    }
  }
  
  array_unique($list_friend);
  return $list_friend;
}

/*
 *  Function: Render [String] List Uid Friends of User logined
 */
function custom_list_user_friends() {
  global $user;
  $list_friend = custom_array_list_user_friends();
  if (!empty($list_friend[0])) {
    return join('+', $list_friend);
  }
  else {
    $list_friend[] = $user->uid;
    return join('+', $list_friend);
  }
}

/*
 * Function : Include friends list with login user
 */
function custom_list_user_friends_uid() {
  global $user;
  return custom_list_user_friends() . '+' . $user->uid;
}

/*
 * Function: Render [Array] List Nid Event ignored by User Logined
 */
function custom_array_list_events_ignore_by_user() {
  $list_ignore = [];
  //  Get result
  $ingore_result = views_get_view_result('node_functions', 'page_11');
  if (!empty($ingore_result)) {
    foreach ($ingore_result as $row) {
      $list_ignore[] = $row->nid;
    }
  }
  if (!empty($joined_result[0])) {
    foreach ($joined_result as $row) {
      $list_ignore[] = $row->nid;
    }
  }
  
  array_unique($list_ignore);
  return $list_ignore;
}

/*
 * Function: Render [String] List Nid Event ignored by User Logined
 */
function custom_list_events_ignore_by_user() {
  $list_ignore = custom_array_list_events_ignore_by_user();
  if (!empty($list_ignore[0])) {
    return join('+', $list_ignore);
  }
  else {
    return '0';
  }
}

/*
 * Fuction:  Render [Array] List Nid by uid has joined activities
 */
function custom_array_list_activity_joined() {
  $list_activity_join = [];
  $activity_join_result = views_get_view_result('node_functions', 'block_35');
  if (!empty($activity_join_result)) {
    foreach ($activity_join_result as $row) {
      $list_activity_join[] = $row->node_field_data_field_activity_nid;
    }
  }
  array_unique($list_activity_join);
  return $list_activity_join;
}

/*
 * Fuction:  Render [string] List Nid by uid has joined activities
 */
function custom_list_activity_joined() {
  $list_activity_join = custom_array_list_activity_joined();
  if (!empty($list_activity_join[0])) {
    return join('+', $list_activity_join);
  }
  else {
    return '0';
  }
}

/*
 * Function:  Filter [Array] the user requests to join the group
 * */
function custom_array_list_request_group() {
  $list_group_request = [];
  $group_result = views_get_view_result('node_functions', 'block_41');
  if (!empty($group_result)) {
    foreach ($group_result as $row) {
      $list_group_request[] = $row->node_field_data_field_activity_nid;
    }
  }
  array_unique($list_group_request);
  
  return $list_group_request;
}

function custom_list_request_group() {
  $list_group_request = custom_array_list_request_group();
  if (!empty($list_group_request[0])) {
    return join('+', $list_group_request);
  }
  else {
    return '0';
  }
}


/*
 * Function:  Render [Array] uid - list user other whom user logined follow
 * */
function custom_array_list_user_following() {
  global $user;
  $list_follower = [];
  // Get results.
  $follower_result = views_get_view_result('node_functions', 'block_5');
  
  // Merge results to one.
  if (!empty($follower_result)) {
    foreach ($follower_result as $row) {
      if ($row->users_field_data_field_member_uid) {
        $list_follower[] = $row->users_field_data_field_member_uid;
      }
    }
  }
  array_unique($list_follower);
  return $list_follower;
}

/*
 * Function:  Render [String] uid - list user other whom user logined follow
 * */
function custom_list_user_following() {
  $list_follower = custom_array_list_user_following();
  if (!empty($list_follower[0])) {
    return join('+', $list_follower);
  }
  else {
    return '0';
  }
}

/*
 * Function: Get [Array] user has a webmaster role
 * */
function custom_array_list_user_administrator() {
  $list_user = [];
  // Get 2 results.
  $user_results = views_get_view_result('user_functions', 'block_user_roles');
  if (!empty($user_results)) {
    foreach ($user_results as $row) {
      if ($row->uid) {
        $list_user[] = $row->uid;
      }
    }
  }
  array_unique($list_user);
  return ($list_user);
}

/*
 * Function: Get [String] user has a webmaster role
 * */
function custom_list_user_administrator() {
  $list_user = custom_array_list_user_administrator();
  if (!empty($list_user[0])) {
    //    dsm(join('+', $list_user));
    return join('+', $list_user);
  }
  else {
    return '1';
  }
}

/*
 * Function: Merge list user include: global(roles-> webmaster) and  friends
 */
function list_user_global_following() {
  $list_global = custom_array_list_user_administrator();
  $list_following = custom_array_list_user_following();
  return join('+', array_unique(array_merge($list_global, $list_following)));
}

//Convert Lat Lng Geofield to text Address
function getaddress($lat, $lng) {
  $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($lat) . ',' . trim($lng) . '&key=YOUR_API_KEY';
  $json = @file_get_contents($url);
  $data = json_decode($json);
  $status = $data->status;
  if ($status == "OK") {
    return $data->results[0]->formatted_address;
  }
  else {
    return FALSE;
  }
}


function custom_list_user_follower_get_follower() {
  global $user;
  $list_follower = [];
  // Get 2 results.
  $follower_result = views_get_view_result('node_functions', 'block_5');
  
  // Merge 2 results to one.
  if (!empty($follower_result)) {
    foreach ($follower_result as $row) {
      if ($row->users_node_uid) {
        $list_follower[] = $row->users_field_data_field_member_uid;
      }
    }
  }
  array_unique($list_follower);
  if (!empty($list_follower[0])) {
    dsm(join('+', $list_follower));
    return join('+', $list_follower);
  }
  else {
    return '0';
  }
}
