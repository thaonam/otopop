<?php
/**
 * Template for all user manage pages list past-record
 *
 * @var    $account
 * @see    custom_preprocess_page
 * @links  file style less:  otopop/less/user_css/_user-dashboard.css.less
 * @see    .page-user-manage-personal-statistic
 *
 */
?>
<!-- Page -->
<div id="page-wrapper"
     class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">
  <!--Header Navbar Fixed Top-->
  <nav class="navbar navbar-static-top  navbar-fixed-top navbar-manager navbar-past_record">
    <!-- Sidebar toggle button-->
    <div class="navbar-header">
      <button type="button" class="navbar-sidebar navbar-left">
        <a href="#"> <i class="fal fa fa-bars"></i></a>
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
              <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else: print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>"
                   alt="">
              <span class="hidden-xs hidden-sm hidden-md"><?php if (!empty($account->field_full_name)): print $account->field_full_name['und'][0]['value']; else: print $account->name; endif; ?></span>
            </a>
          <?php endif; ?>

        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
  <div id="page" class="clearfix">
    <!--Sidebar Menu-->
    
    <?php if ($page['left']): ?>
      <aside class="main-sidebar sidebar-toggle sidebar left " id="left" style="left: -300px;">
        <?php print render($page['left']); ?>
      </aside>
    <?php endif; ?>

    <!-- /.sidebar -->
    <!--Content Manager-->
    <div id="content" class="content-wrapper  clearfix" style="margin-left: 0;">
      <!--Regions Header-->
      <div id="header" class="clearfix">
        <?php if ($page['header']): ?>
          <div id="header-content">
            <?php print render($page['header']); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="content-manage container">
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php if ($messages) print $messages; ?>
        <?php if ($tabs) print render($tabs); ?>
        <?php print render($page['content']); ?>
      </div>
      <!--Regions Footer-->
      <?php if (!empty($page['footer'])): ?>
        <footer class="footer">
          <div class=" <?php print $container_class; ?>">
            <?php print render($page['footer']); ?>
          </div>
        </footer>
      <?php endif; ?>
    </div>

  </div>
</div>
