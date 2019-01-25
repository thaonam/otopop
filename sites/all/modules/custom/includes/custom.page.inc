<?php /* Pages */

/**
 * Page for all second level of user manage.
 */
function custom_user_manage_page($page_name, $page_value) {
  return '';
}

/**
 * Page to manage friends.
 */
function custom_user_manage_friends_page() {
  // Get 2 results.
  $creator_result = views_get_view_result('node_functions', 'block_31');
  $invitor_result = views_get_view_result('node_functions', 'block_32');
  
  // Merge 2 results to one.
  $result = array();
  foreach ($creator_result as $row) {
    $result[] = $row->nid;
  }
  
  foreach ($invitor_result as $row) {
    $result[] = $row->nid;
  }
  
  array_unique($result);
//  dsm($result);
  return views_embed_view('node_functions', 'page_6', join(',', $result));
}

/**
 * Page User Profile
 */
function custom_user_profile() {
  global $user;
  if (!$user->uid) {
    drupal_access_denied();
    drupal_exit();
    
  }
  else {
    return '';
  }
  
}

/**
 * Page User custom_user_invite_friends
 */
function custom_user_invite_friends() {
  return '';
}

function custom_user_coming_soon() {
  return '<h3> Coming soon</h3>';
}