<?php
/**
 * @file: Template Global
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['left']: Items for the first sidebar.
 * - $page['right']: Items for the first sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * Main menu: $primary_nav
 */
?>
<div id="page-wrapper" class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">

  <!-- Header: Menu Top Header-->
  <?php if (!empty($node)): if ($node->type == 'landing_page'): ?>
    <div>
      <nav class="navbar navbar-expand-lg navbar-light container fixed-top navbar-fixed-top" id="mainNav">
        <div class="navbar-header">
          <button type="button" class="navbar-sidebar navbar-left">
            <a href="#"> <i class="fal fa fa-bars"></i></a>
          </button>
          <?php if ($logo): ?>
            <a class="navbar-brand" href="/user" title="<?php print t('Home'); ?>" rel="home"
               id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/></a>
          <?php endif; ?>
        </div>
        <div class="collapse navbar-collapse ml-auto" id="navbarResponsive">
          <div class="info-acc__right text-right d-flex flex-row-reverse">
            <div class="dropdown">
              <a class="btn btn-default dropdown-toggle" type="button" href="/user/profile">
                <div class="info-acc__ava-name d-inline-flex align-items-center">
                  <div class="ava">
                    <img src="<?php if (!empty($account->field_photo)): print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else: print '/sites/default/files/default_images/no_photo_0.png'; endif; ?> " alt=""/>
                  </div>
                  <div class="name"><?php print $account->field_full_name['und'][0]['value']; ?></div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  <?php elseif ($node->type == 'past_record'): ?>
    <!--Header Navbar Fixed Top-->
    <nav class="navbar navbar-static-top  navbar-fixed-top navbar-manager navbar-past_record">
      <!-- Sidebar toggle button-->
      <div class="navbar-header">
        <button type="button" class="navbar-sidebar navbar-left">
          <a href="/user"> <i class="fal fa fa-bars"></i></a>
        </button>
        <?php if ($logo): ?>
          <a class="sidebar-toggle navbar-brand" href="/user" title="<?php print t('Home'); ?>"
             rel="home"
             id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive"/> OTOPOP</a>
        <?php endif; ?>
      </div>

      <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav navbar-right">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="notifications-menu">
            <a href="#">
              <i class="fas fa-bell"></i>
              <span class="label hidden label-warning">10</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class=" user user-menu">
            
            <?php if (!empty($account)): ?>
              <a href="/user">
                <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else:print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>" alt="">
                <span class="hidden-xs hidden-sm hidden-md"><?php print $account->field_full_name['und'][0]['value']; ?></span>
              </a>
            <?php endif; ?>

          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  <?php else: ?>
    <header id="navbar" role="banner" class="navbar-fixed">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php if ($logo): ?>
              <a class="navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
              </a>
            <?php endif; ?>
          </div>
          <?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
            <div class="navbar-collapse collapse" id="navbar-collapse">
              <nav role="navigation">
                <?php if (!empty($primary_nav)): print render($primary_nav); endif; ?>
                <?php if ($logged_in) : ?>
                
                <?php else: ?>
                  <ul class="nav navbar-nav navbar-right button-login">
                    <li><a href="/user/register">Sign Up</a></li>
                  </ul>
                <?php endif; ?>
              </nav>
            </div>
          <?php endif; ?>
        </div>
      </nav>
    </header>
  <?php endif; endif; ?>

  <!-- Page -->
  <div id="page" class="clearfix">
    <?php if ($page['left']): ?>
      <div id="left" class="sidebar main-sidebar  sidebar-overlay left" style="left: -300px;">
        <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
        <?php print render($page['left']); ?>
      </div>
    <?php endif; ?>

    <div id="content" class="content-wrapper clearfix">
      <!--Regions Header-->
      <div id="header" class="clearfix">
        <?php if ($page['header']): ?>
          <div id="header-content"><?php print render($page['header']); ?></div><?php endif; ?>
      </div>
      <div class="container">
        <?php if ($is_front): ?>
          <?php hide($page['content']['system_main']); ?>
        <?php else: ?>
          <?php print render($title_prefix); ?>
          <?php print render($title_suffix); ?>
        <?php endif; ?>
        
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php if ($messages) print $messages; ?>
        <?php if ($tabs) print render($tabs); ?>
        <?php if ($breadcrumb) print render($breadcrumb); ?>
        
        <?php print render($page['content']); ?>

      </div>
      
      <?php if ($page['right']): ?>
        <div id="right" class="sidebar right">
          <?php print render($page['right']); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!--Footer-->
  <?php if (!empty($page['footer'])): ?>
    <footer class="footer">
      <div class=" <?php print $container_class; ?>">
        <?php print render($page['footer']); ?>
      </div>
    </footer>
  <?php endif; ?>
</div>
<?php if (!empty($node)): if ($node->nid == "32"): ?>
  <div class="modal fade modal-event" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-event">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel"> Title </h4>
          <div class="modal-author">Organised by <span></span></div>
          <div class="modal-event-location"><i class="fas fa-map-marker"></i> <span></span></div>
        </div>
        <div class="modal-body  modal-body-event">

          <div class="modal-event-desc">Nội dung ở đây</div>
          <div class="modal-group-select-radio">
            <div class="group-title">Select your option</div>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#medal"><i class="fa fa-circle" aria-hidden="true"></i> Medal  <span class="modal-price" style="padding-left: 5px"> </span></a></li>
              <li><a data-toggle="tab" href="#free"><i class="fa fa-circle" aria-hidden="true"></i> No Medal - $0 (Free)</a></li>
            </ul>


          </div>
        </div>
        <div class="modal-footer">
          <div class="tab-content">
            <div id="medal" class="tab-pane fade in active">
              <a href="#" class="modal-button " data-price="">Process Payment</a>
            </div>
            <div id="free" class="tab-pane fade">
              <div class="modal-button btn-join " onclick="custom_user_going_events(this); return false;"> Join Now</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif;endif; ?>