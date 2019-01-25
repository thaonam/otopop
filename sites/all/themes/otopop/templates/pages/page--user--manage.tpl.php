<?php
/**
 * Template for all user manage pages
 *
 * $account: info profile user logined
 * $posts_number : count post by uid logined
 * $user_followes: count user followers by user logined
 * $user_following: count user following by user logined
 *
 * @see custom_preprocess_page
 */
?>
<!-- Page -->
<div id="page-wrapper"
     class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">
  <!--Header Navbar Fixed Top-->
  <nav class="navbar navbar-static-top  navbar-fixed-top navbar-manager">
    <!-- Sidebar toggle button-->
    <div class="navbar-header">
      <button type="button" class="navbar-sidebar open navbar-left">
        <a href="#"> <i class="fal fa fa-bars"></i></a>
      </button>
      <?php if ($logo): ?>
        <a class="sidebar-toggle navbar-brand" href="/user" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive"/></a>
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
            <a href="/user/profile">
              <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else:print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>"
                   alt="">
              <span class="hidden-xs hidden-sm hidden-md"><?php if ($account->field_full_name):print $account->field_full_name['und'][0]['value']; else: print $account->name; endif; ?></span>
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
      <aside class="main-sidebar  sidebar-toggle sidebar left  open" id="left">
        <?php print render($page['left']); ?>
      </aside>
    <?php endif; ?>
    <!-- /.sidebar -->

    <!--Content Manager-->
    <div id="content" class="content-wrapper  clearfix" style="margin-left: 315px">
      <div class="content-row">
        <div class="col-md-8 content-manage">
          
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php if ($tabs) print render($tabs); ?>
          
          
          <?php if (!empty($activity_by_term)):print  render($activity_by_term); endif; ?>
          <?php print render($page['content']); ?>

        </div>
        <!--Sidebar Right-->
        <div id="right" class="sidebar col-md-4 right">
          <div class="profile-user">
            <div class="field_avartar">
              <img src="<?php if (!empty($account->field_photo)):
                print image_style_url('style_100x100', $account->field_photo['und'][0]['uri']);
              else:
                print "/sites/default/files/styles/style_100x100/public/default_images/no_photo_0.png"; endif; ?>"
                   alt="">
            </div>
            <div class="field_full_name"><?php if (!empty($account->field_full_name)): print $account->field_full_name['und'][0]['value']; else: print $account->name; endif; ?></div>
            <div class="gr-statistic">
              <span><?php print $post_number; ?> posts</span>
              <span><?php print $user_followers ?> followers</span>
              <span><?php print $user_followings ?> following</span>
            </div>
            <div
                class="field_description"><?php if (!empty($account->field_description)): print $account->field_description['und'][0]['value']; endif; ?></div>
          </div>
          <?php if ($page['right']): ?>
            <?php print render($page['right']); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
