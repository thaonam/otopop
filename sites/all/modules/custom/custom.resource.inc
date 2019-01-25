<?php

/**
 * Load a node via web service.
 */
function custom_node_load_callback($nid) {
  return node_load($nid);
}

/**
 * Calculate calories burn.
 */
function custom_calories_burn_callback($seconds, $sport_tid, $field_image_fid) {
  module_load_include('inc', 'custom', 'includes/custom');
  return custom_calories_burn($seconds, $sport_tid, $field_image_fid);
}

/**
 * Callback function to smart login a user.
 */
function custom_account_smart_login_callback($name, $password) {
  module_load_include('inc', 'custom', 'includes/custom.user');
  return custom_account_smart_login($name, $password);
}

/**
 * Callback function to create or update an user account.
 */
function custom_user_store_callback($uid, $account_fields) {
  module_load_include('inc', 'custom', 'includes/custom.user');
  return custom_user_store($uid, $account_fields);
}

/**
 * Callback function to update user password (requires old pass input).
 */
function custom_user_password_update_callback($uid, $pass, $old_pass) {
  module_load_include('inc', 'custom', 'includes/custom.user');
  return custom_user_password_update($uid, $pass, $old_pass);
}

/**
 * Callback function to create or update a node.
 */
function custom_node_store_callback($nid, $node_fields) {
  module_load_include('inc', 'custom', 'includes/custom.node');
  return custom_node_store($nid, $node_fields);
}

/**
 * Callback function to create a Drupal comment.
 */
function custom_comment_create_callback($nid, $parent_id, $subject, $comment_body, $comment_author, $comment_status) {
  module_load_include('inc', 'custom', 'includes/custom.node');
  return custom_comment_create($nid, $parent_id, $subject, $comment_body, $comment_author, $comment_status);
}

/**
 * Callback function to create / login a user via its social account.
 */
function custom_social_login_callback($data) {
  module_load_include('inc', 'custom', 'includes/custom.user');
  return custom_user_social_login($data);
}

/**
 * Callback function to create a photo filename by its imagedata.
 */
function custom_photo_data_upload_callback($filename, $imagedata) {
  module_load_include('inc', 'custom', 'includes/custom.media');
  return custom_photo_data_upload($filename, $imagedata);
}

/**
 * Callback function to update user geocode.
 * To-do: Will rebuild this function later.
 */
function custom_geocode_update_callback($uid, $nid, $lat, $lon) {
  module_load_include('inc', 'custom', 'includes/custom.user');
  return custom_user_geocode_update($uid, $nid, $lat, $lon);
}