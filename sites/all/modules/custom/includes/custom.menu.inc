<?php /* System menu defination */

/**
 * Return menu array for hook_menu().
 */
function custom_menu_load() {
  $items = array();

  $items['admin/test'] = array(
    'page callback' => 'custom_test',
    'access arguments' => array('view the administration theme'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.inc',
  );

  $items['admin/project'] = array(
    'page arguments' => array('custom_project_settings_form'),
    'page callback' => 'drupal_get_form',
    'access arguments' => array('administer custom settings'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.admin.inc',
  );

  $items['custom/photo-upload'] = array(
    'page callback' => 'custom_photo_upload',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.media.inc',
  );

  // Create menus for user manage pages.
  $items['user/manage/%/%'] = array(
    'page callback' => 'custom_user_manage_page',
    'page arguments' => array(2, 3),
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.page.inc',
  );

  $items['user/manage/friends'] = array(
    'title' => t('Friends'),
    'page callback' => 'custom_user_manage_friends_page',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.page.inc',
  );
  $items['user/profile'] = array(
    'title' => t('Profile'),
    'page callback' => 'custom_user_profile',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.page.inc',
  );
  $items['user/invite-friends'] = array(
    'title' => t('Invite Friends'),
    'page callback' => 'custom_user_invite_friends',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.page.inc',
  );  $items['user/manage/coming-soon'] = array(
    'title' => t('Coming Soon'),
    'page callback' => 'custom_user_coming_soon',
    'access arguments' => array('access content'),
    'type' => MENU_CALLBACK,
    'file' => 'includes/custom.page.inc',
  );
  

  return $items;
}
