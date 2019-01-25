<?php

/**
 * Google settings form.
 */
function custom_google_settings_form($form, $form_state) {
  $form['custom_google_notify'] = array(
    '#markup' => '<p class="google-desc">' . t('Please register for a Google API account in order to fill in to the settings form below.') . '<br /><a href="https://console.developers.google.com/project/_/apiui/apis/library/" target="_blank">https://console.developers.google.com/project/_/apiui/apis/library/</a></p>',
  );

  $form['custom_google_api_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Google API key'),
    '#description' => t('API key used for Google map / places.'),
    '#default_value' => variable_get('custom_google_api_key', ''),
  );
  
  $form['custom_google_app_id'] = array(
    '#type' => 'textfield',
    '#title' => t('Google client id'),
    '#description' => t('App id used for Google login.'),
    '#default_value' => variable_get('custom_google_app_id', ''),
    '#required' => true,
  );

  $form['custom_google_app_secret'] = array(
    '#type' => 'textfield',
    '#title' => t('Google secret key'),
    '#description' => t('App secret used for Google login.'),
    '#default_value' => variable_get('custom_google_app_secret', ''),
    '#required' => true,
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save settings'),
  );
  
  return $form;
}

/**
 * Google settings submit.
 */
function custom_google_settings_form_submit($form, &$form_state) {
  // Store values.
  variable_set('custom_google_api_key', $form_state['values']['custom_google_api_key']);
  variable_set('custom_google_app_id', $form_state['values']['custom_google_app_id']);
  variable_set('custom_google_app_secret', $form_state['values']['custom_google_app_secret']);
  
  drupal_set_message(t('Your Google API settings have been saved!'));
}
