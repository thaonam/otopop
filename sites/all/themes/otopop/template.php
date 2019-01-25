<?php
  
/**
 * Override or insert variables into the page template.
 */
function otopop_preprocess_page(&$vars) {
  //dsm($vars['theme_hook_suggestions']);
}
  
/**
 * Implement hook_form_alter().
 */
function otopop_form_alter(&$form, &$form_state, $form_id) {
  /*
  switch ($form_id) {
    case 'user_login':
      $suffix = '<div class="line_or"> Or </div>';
      $suffix .= '<div class="social-login">';
      $suffix .= '<div class="sub-title">' . t("Sign up") . '<span>via</span></div>';
      $suffix .= '<ul class="custom-social-list">';
      $suffix .= '<li rel="facebook" id="facebookSignin">Facebook</li>';
      $suffix .= '<li rel="google" id="googleSignIn">Google</li>';
      $suffix .= '</ul>';
      $suffix .= '</div>';
      $form['#suffix'] = $suffix;

      break;
      
    case 'user_register_form':
      $prefix = '<div class="col-md-5 block-form-left">';
      $prefix .= '<h1 class="title_Form "> Register your account </h1></div> <div class="col-md-7"> <div class="row"> <div class="col-md-7">';

      $form['#prefix'] = $prefix;
      $suffix = '</div><div class="line_Or"> Or </div>';
      $suffix .= '<div class="social-login col-md-5">';
      $suffix .= '<div class="sub-title">' . t("Sign up") . '<span>via</span></div>';
      $suffix .= '<ul class="custom-social-list">';
      $suffix .= '<li rel="facebook" id="facebookSignin">Facebook</li>';
      $suffix .= '<li rel="google" id="googleSignIn">Google</li>';
      $suffix .= '</ul>';
      $suffix .= '</div></div></div>';
      $form['#suffix'] = $suffix;

      break;
  }
  */
}
