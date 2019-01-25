<?php
/**
 * Override or insert variables into the page template.
 */
function otopopadmin_preprocess_page(&$vars) {
  // Add theme bootstrap / fontawesome support.
  drupal_add_css(drupal_get_path('theme', 'otopopadmin') . '/font-awesome/css/font-awesome.min.css');
  drupal_add_css(drupal_get_path('theme', 'otopopadmin') . '/bootstrap/css/bootstrap.min.css');

  $vars['primary_local_tasks'] = $vars['tabs'];
  unset($vars['primary_local_tasks']['#secondary']);
  $vars['secondary_local_tasks'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
}

/**
 * Display the list of available node types for node creation.
 */
function otopopadmin_node_add_list($variables) {
  $content = $variables['content'];
  $output = '';
  if ($content) {
    $output = '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="clearfix">';
      $output .= '<span class="label">' . l($item['title'], $item['href'], $item['localized_options']) . '</span>';
      $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  else {
    $output = '<p>' . t('You have not created any content types yet. Go to the <a href="@create-content">content type creation page</a> to add a new content type.', array('@create-content' => url('admin/structure/types/add'))) . '</p>';
  }
  return $output;
}

/**
 * Setup page title for some special pages.
 */
function otopopadmin_page_title($title) {
  if (arg(0) == 'admin' and arg(1) == 'dashboard') {
    drupal_set_title(t('Dashboard'));
    return '<i class="fa fa-tachometer" aria-hidden="true"></i> ' . t('Dashboard');
  }
  else if (arg(0) == 'admin' and arg(1) == 'content' and !arg(2)) {
    drupal_set_title(t('Content'));
    return '<i class="fa fa-file-text-o" aria-hidden="true"></i> ' . t('Content');
  }
  else if (arg(0) == 'admin' and arg(1) == 'people') {
    drupal_set_title(t('Users'));
    return '<i class="fa fa-users" aria-hidden="true"></i> ' . t('Users');
  }
  else if (arg(0) == 'admin' and arg(1) == 'structure' and arg(2) == 'menu') {
    drupal_set_title(t('Menu'));
    return '<i class="fa fa-bars" aria-hidden="true"></i> ' . t('Menu');
  }
  else if (arg(0) == 'admin' and arg(1) == 'config' and arg(2) == 'system' and arg(3) == 'site-information') {
    drupal_set_title(t('Site information'));
    return '<i class="fa fa-info-circle" aria-hidden="true"></i> ' . t('Site information');
  }
  else if (arg(0) == 'admin' and arg(1) == 'store') {
    drupal_set_title(t('Store'));
    return '<i class="fa fa-shopping-bag" aria-hidden="true"></i> ' . t('Store');
  }
  else if (arg(0) == 'admin' and arg(1) == 'content' and arg(2) == 'file') {
    drupal_set_title(t('Media'));
    return '<i class="fa fa-file-image-o" aria-hidden="true"></i> ' . t('Media');
  }
  else if (arg(0) == 'admin' and arg(1) == 'config' and arg(2) == 'search' and arg(3) == 'path') {
    drupal_set_title(t('SEO'));
    return '<i class="fa fa-google" aria-hidden="true"></i> ' . t('SEO');
  }
  else if (arg(0) == 'admin' and arg(1) == 'config' and arg(2) == 'system' and arg(3) == 'smtp') {
    drupal_set_title(t('E-mail'));
    return '<i class="fa fa-envelope" aria-hidden="true"></i> ' . t('E-mail');
  }
  else if (arg(0) == 'admin' and arg(1) == 'config' and arg(2) == 'regional' and arg(3) == 'language') {
    drupal_set_title(t('Language'));
    return '<i class="fa fa-globe" aria-hidden="true"></i> ' . t('Language');
  }
  else if (arg(0) == 'admin' and arg(1) == 'config' and arg(2) == 'people' and arg(3) == 'captcha') {
    drupal_set_title(t('System'));
    return '<i class="fa fa-codepen" aria-hidden="true"></i> ' . t('System');
  }
  else if (arg(0) == 'admin' and arg(1) == 'appearance' and arg(2) == 'settings') {
    drupal_set_title(t('Appearance'));
    return t('Appearance');
  }
  
  return $title;
}