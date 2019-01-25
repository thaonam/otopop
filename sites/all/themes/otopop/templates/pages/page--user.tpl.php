<?php
/**
 * @file
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
 *
 * - $account :user logged in
 *
 * @see custom_preprocess_page() in module custom
 */
?>
<div id="page-wrapper"
     class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">
  <?php if ($logged_in) : ?>
    <!-- Navigation -->
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
            <?php if (!empty($account)): ?>
              <a class="btn btn-default dropdown-toggle" type="button" href="/user/profile">
                <div class="info-acc__ava-name d-inline-flex align-items-center">
                  <div class="ava">
                    <img src="<?php if (!empty($account->field_photo)): print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else: print '/sites/default/files/default_images/no_photo_0.png'; endif; ?> "
                         alt=""/>
                  </div>
                  <div class="name"><?php print !empty($account->field_full_name['und']) ? $account->field_full_name['und'][0]['value'] : print $account->name; ?></div>
                </div>
              </a>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </nav>


    <!-- Page -->
    <div id="page" class="clearfix">
      <!--Sidebar Menu-->
      <?php if ($page['left']): ?>
        <aside class="main-sidebar  sidebar-overlay sidebar left" id="left" style="left: -300px">
          <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
          <?php print render($page['left']); ?>
        </aside>
      <?php endif; ?>
      <!-- /.sidebar -->
      <div id="content" class="content-wrapper clearfix">
        <!-- Header -->
        <div id="header" class="clearfix">
          <header class="masthead"
                  style="background-image: url('<?php print file_create_url($account->field_image_cover['und'][0]['uri']); ?>')">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-10">
                  <div class="site-heading">
                    <span class="subheading"><?php print render($account->field_description['und'][0]['value']) ?> </span>
                  </div>
                </div>
              </div>
            </div>
          </header>
          
          <?php if ($page['header']): ?>
            <div id="header-content">
              <div class="content-wrapper">
                <?php print render($page['header']); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div class=" <?php print $container_class; ?>">
          
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php if ($messages) print $messages; ?>

          <div class="row">
            <?php if (!empty($event_list)): ?>
              <div class="col-md-6 event-list block block-views clearfix" id="block-views-node-functions-block-1">
                <h2 class="block-title">Event</h2>
                <?php print $event_list; ?>
              </div>
            <?php endif; ?>
            
            <?php if (!empty($activity_list)): ?>
              <div class="col-md-6 activity-list  block block-views" id="block-views-node-functions-block-3">
                <h2 class="block-title">DISCOVER ACTIVITY</h2>
                <?php print $activity_list; ?>
              </div>
            <?php endif; ?>
            
            <?php if (!empty($post_by_list_friend)): ?>
              <section id="block-views-node-functions-block-2" class="block block-views col-md-12 block-global-header-bg contextual-links-region clearfix">
                <h2 class="block-title">New Sfeed</h2>
                <?php print $post_by_list_friend; ?>
              </section>
            <?php endif; ?>
            <?php print render($page['content']); ?>
          </div>

        </div>
      </div>
    </div>
  
  <?php else: ?>
    <!-- Check if user has not logged -->
    <header id="navbar" role="banner">
      <div class="container">
        <div class="navbar-header">
          <?php if ($logo): ?> <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/></a> <?php endif; ?>
        </div>

        <div class="navbar-collapse collapse" id="navbar-collapse">
          <nav role="navigation">
            <div class="button-login navbar-right"><a href="user/login">Login</a></div>
          </nav>
        </div>
      </div>
    </header>

    <div id="content" class="content-wrapper clearfix">
      <div class="main-container <?php print $container_class; ?>">
        <div class="row">
          <div class="col-md-12">
            
            <?php if ($messages) print $messages; ?>
            <?php if ($tabs) print render($tabs); ?>

            <!--Content-->
            <?php print render($page['content']); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Footer -->
  <?php if (!empty($page['footer'])): ?>
    <footer id="footer" class="clearfix footer">
      <div class=" <?php print $container_class; ?>">
        <?php print render($page['footer']); ?>

      </div>
    </footer>
  <?php endif; ?>
</div>
