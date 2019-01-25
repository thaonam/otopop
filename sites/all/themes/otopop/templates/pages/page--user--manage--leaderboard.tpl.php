<?php
/**
 * Template user manage challege
 *
 *
 * @see custom_preprocess_page
 */
global $base_url;
$current_path = '/' . current_path();
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
              <img src="<?php if (!empty($account->field_photo)):
                print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']);
              else:
                print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>"
                   alt="">
              <span
                  class="hidden-xs hidden-sm hidden-md"><?php print $account->field_full_name['und'][0]['value']; ?></span>
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
      <aside class="main-sidebar sidebar-toggle sidebar left" id="left" style="left: -300px;">
        <?php print render($page['left']); ?>
      </aside>
    <?php endif; ?>
    <!-- /.sidebar -->

    <!--Content Manager-->
    <div id="content" class="content-wrapper  clearfix" style="margin-left: 0;">
      <!--Profile User-->
      <?php if (!empty($account)): ?>
        <div class="profile-user profile-full" style="background-image: linear-gradient(0deg, rgba(242, 242, 242, 0.66), rgba(242, 242, 242, 0.66)),url('<?php print file_create_url($account->field_image_cover['und'][0]['uri']); ?>')">
          <div class="container">
            <div class="d-flex">
              <div class="field_avartar">
                <img src="<?php if (!empty($account->field_photo)): print image_style_url('style_150x150', $account->field_photo['und'][0]['uri']); else: print 'https://otopop.thietkewebgiaidieu.com/sites/default/files/default_images/no_photo.png'; endif; ?>"
                     alt="">
              </div>
              <div class="profile-user-info">
                <div class="field_full_name"><?php if (!empty($account->field_full_name)):print $account->field_full_name['und'][0]['value']; else: print $account->name; endif; ?></div>
                <div class="gr-statistic">
                  <span><?php print $post_number; ?> posts</span>
                  <span><?php print $user_followers ?> followers</span>
                  <span><?php print $user_followings ?> following</span>
                </div>
                <div class="field_description"><?php if (!empty($account->field_description)): print $account->field_description['und'][0]['value']; endif; ?></div>
              </div>
            </div>
            <div class="user-action">
              <a href="/user/<?php print $account->uid; ?>/edit" class="btn-edit"><i class="fa fa-ellipsis-h m-r-xs"></i> Edit Profile</a>
              <a href=""><i class="fas fa-chart-area m-r-xs"></i> Statistic</a>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="container">
        <div class="row">

          <div id="right" class="sidebar col-md-5 right">
            
            <?php if ($page['right']): ?>
              <?php print render($page['right']); ?>
            <?php endif; ?>
          </div>
          <div class="col-md-7 content-manage">
            <h1 class="page-title">My Social Leaderboard</h1>
            
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            
            <?php if ($messages) print $messages; ?>
            
            <?php if ($tabs) print render($tabs); ?>
            
            <?php if ($current_path == '/user/manage/leaderboard/challenge'): ?>

              <div class="block-challege-invite">
                <div class="challege-item">
                  <img src="/sites/default/files/styles/style_54x65/public/e-medals/cup.png" alt="">
                  <div class="challege-name"> 1 vs 1</div>
                  <div class="btn-invite">Invite</div>
                </div>
                <div class="challege-item">
                  <img src="/sites/default/files/styles/style_54x65/public/e-medals/cup.png" alt="">
                  <div class="challege-name"> Team Challege</div>
                  <div class="btn-invite">Invite</div>
                </div>
                <div class="challege-item challege-lock">
                  <img src="/sites/default/files/styles/style_54x65/public/e-medals/cup.png" alt="">
                  <div class="challege-name">Super Challege</div>
                  <div class="btn-invite">Invite</div>
                </div>
              </div>
            <?php endif; ?>
            
            <?php print render($page['content']); ?>
          </div>
          <!--Sidebar Right-->
        </div>
      </div>
    </div>
  </div>
</div>
