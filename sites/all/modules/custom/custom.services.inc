<?php
/**
 * Define services function.
 */
function custom_services_resources() {
  $resources = array(
    'drupalapp' => array(
      'actions' => array(
        // Node load.
        'node_load' => array(
          'help' => t('Load a node.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_node_load_callback',
          'args' => array(
            array(
              'name' => 'nid',
              'type' => 'int',
              'description' => t('Node id.'),
              'source' => array('data' => 'nid'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),

        // Smart login.
        'calories_burn' => array(
          'help' => t('Calculate and store user calories burn.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_calories_burn_callback',
          'args' => array(
            array(
              'name' => 'seconds',
              'type' => 'int',
              'description' => t('Number of seconds this user has done the excerise.'),
              'source' => array('data' => 'seconds'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'sport_tid',
              'type' => 'int',
              'description' => t('Type of sport.'),
              'source' => array('data' => 'sport_tid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'field_image_fid',
              'type' => 'int',
              'description' => t('Field Image'),
              'source' => array('data' => 'field_image_fid'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        
        // Smart login.
        'account_smart_login' => array(
          'help' => t('Login a user via username, mail, or mobile.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_account_smart_login_callback',
          'args' => array(
            array(
              'name' => 'name',
              'type' => 'string',
              'description' => t('Name which can be username, email, or mobile phone.'),
              'source' => array('data' => 'name'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'password',
              'type' => 'string',
              'description' => t('Password.'),
              'source' => array('data' => 'password'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        // Do a FB / Google+ login.
        'social_login' => array(
          'help' => t('Login with Facebook / Google.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_social_login_callback',
          'args' => array(
            array(
              'name' => 'data',
              'type' => 'array',
              'description' => t('User profile.'),
              'source' => array('data' => 'data'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        
        // User account create / update.
        'user_store' => array(
          'help' => t('Create / Update an user with provided fields.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_user_store_callback',
          'args' => array(
            array(
              'name' => 'uid',
              'type' => 'int',
              'description' => t('User id. Set to 0 to create a new user.'),
              'source' => array('data' => 'uid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'account_fields',
              'type' => 'array',
              'description' => t('Account fields to be stored.'),
              'source' => array('data' => 'account_fields'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        // User password update.
        'user_password_update' => array(
          'help' => t('Update an existing user password.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_user_password_update_callback',
          'args' => array(
            array(
              'name' => 'uid',
              'type' => 'int',
              'description' => t('User uid.'),
              'source' => array('data' => 'uid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'pass',
              'type' => 'string',
              'description' => t('Password.'),
              'source' => array('data' => 'pass'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'old_pass',
              'type' => 'string',
              'description' => t('Password.'),
              'source' => array('data' => 'old_pass'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        // Node create / update.
        'node_store' => array(
          'help' => t('Create / Update a node with provided fields.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_node_store_callback',
          'args' => array(
            array(
              'name' => 'nid',
              'type' => 'int',
              'description' => t('Node id. Set 0 to create a new node.'),
              'source' => array('data' => 'nid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'node_fields',
              'type' => 'array',
              'description' => t('Node fields to be updated.'),
              'source' => array('data' => 'node_fields'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        // Create a new comment.
        'comment_create' => array(
          'help' => t('create a new comment.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_comment_create_callback',
          'args' => array(
            array(
              'name' => 'nid',
              'type' => 'int',
              'description' => t('Attach to node id.'),
              'source' => array('data' => 'nid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'parent_id',
              'type' => 'int',
              'description' => t('The comment id that this comment replies to. 0 if no reply'),
              'source' => array('data' => 'parent_id'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'subject',
              'type' => 'string',
              'description' => t('Comment subject.'),
              'source' => array('data' => 'subject'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'comment_body',
              'type' => 'string',
              'description' => t('Comment body.'),
              'source' => array('data' => 'comment_body'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'comment_author',
              'type' => 'string',
              'description' => t('Author name of this comment.'),
              'source' => array('data' => 'comment_author'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'comment_status',
              'type' => 'int',
              'description' => t('Whether is published or unpublished.'),
              'source' => array('data' => 'comment_status'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        // Upload an image data then return its fid.
        'photo_data_upload' => array(
          'help' => t('Upload an image by its data.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_photo_data_upload_callback',
          'args' => array(
            array(
              'name' => 'filename',
              'type' => 'string',
              'description' => t('Image filename with extension.'),
              'source' => array('data' => 'filename'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'imagedata',
              'type' => 'string',
              'description' => t('Image data string.'),
              'source' => array('data' => 'imagedata'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
        
        // Update for geofield.
        'geocode_update' => array(
          'help' => t('Update user geocode position.'),
          'file' => array(
            'type' => 'inc',
            'module' => 'custom',
            'name' => 'custom.resource',
          ),
          'callback' => 'custom_geocode_update_callback',
          'args' => array(
            array(
              'name' => 'uid',
              'type' => 'int',
              'description' => t('User uid.'),
              'source' => array('data' => 'uid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'nid',
              'type' => 'int',
              'description' => t('User profile nid.'),
              'source' => array('data' => 'nid'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'lat',
              'type' => 'string',
              'description' => t('Latitude.'),
              'source' => array('data' => 'lat'),
              'optional' => FALSE,
            ),
            array(
              'name' => 'lon',
              'type' => 'string',
              'description' => t('Longitude.'),
              'source' => array('data' => 'lon'),
              'optional' => FALSE,
            ),
          ),
          'access callback' => '_drupalgap_resource_access',
          'access callback file' => array(
            'type' => 'inc',
            'module' => 'drupalgap',
            'name' => 'drupalgap.resource',
          ),
          'access arguments' => array('access content'),
          'access arguments append' => TRUE,
        ),
      ),
    ),
  );
  
  return $resources;
}