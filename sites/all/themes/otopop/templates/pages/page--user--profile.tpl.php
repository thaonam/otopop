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
      <button type="button" class="navbar-sidebar navbar-left"><i class="fal fa fa-bars"></i></button>
      <?php if ($logo): ?>
        <a class="sidebar-toggle navbar-brand" href="/user" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive"/> OTOPOP</a>
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
              <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_40x40', $account->field_photo['und'][0]['uri']); else: print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>" alt="">
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
                <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_150x150', $account->field_photo['und'][0]['uri']); else: print "/sites/default/files/styles/style_150x150/public/default_images/no_photo_0.png"; endif; ?>" alt="">

              </div>
              <div class="profile-user-info">
                <div class="field_full_name"><?php if ($account->field_full_name):print $account->field_full_name['und'][0]['value']; else: print $account->name; endif; ?></div>
                <div class="gr-statistic">
                  <span><?php print $post_number; ?> posts</span>
                  <span><?php print $user_followers ?> followers</span>
                  <span><?php print $user_followings ?> following</span>
                </div>
                <div
                    class="field_description"><?php if (!empty($account->field_description)): print $account->field_description['und'][0]['value']; endif; ?></div>
              </div>
            </div>
            <div class="user-action">
              <a href="/user/<?php print $account->uid; ?>/edit" class="btn-edit"><i class="fa fa-ellipsis-h m-r-xs"></i> Edit Profile</a>
              <a href="/user/manage/personal-statistic"><i class="fas fa-chart-area m-r-xs"></i> Statistic</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="container">
        <div class="row">

          <div id="right" class="sidebar col-md-5 right">
            <?php if ($page['right']): ?><?php print render($page['right']); ?><?php endif; ?>
          </div>

          <div class="col-md-7 content-manage">
            
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            <?php if ($messages) print $messages; ?>
            <?php if ($tabs) print render($tabs); ?>
            <div class="panel panel-default block-created-post ">
              <div class="panel-body bg-gray">
                <div><textarea class="form-control bg-gray no-border" id="text-body-post" placeholder="What activity have you done today?"></textarea></div>
                <hr>
                <div>
                  <button class="btn" style="background-color:#94b8f3 !important;">
                    <svg class="svg-inline--fa fa-camera fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                      <path fill="currentColor"
                            d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path>
                    </svg><!-- <i class="fa fa-camera"></i> --> Photo/Video
                  </button>
                  <button class="btn" style="background-color:#eab054 !important;">
                    <svg class="svg-inline--fa fa-smile fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="smile" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                      <path fill="currentColor"
                            d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm-160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm194.8 170.2C334.3 380.4 292.5 400 248 400s-86.3-19.6-114.8-53.8c-13.6-16.3 11-36.7 24.6-20.5 22.4 26.9 55.2 42.2 90.2 42.2s67.8-15.4 90.2-42.2c13.4-16.2 38.1 4.2 24.6 20.5z"></path>
                    </svg><!-- <i class="fa fa-smile"></i> --> Sticker/Emoji
                  </button>
                  <button class="btn" style="background-color:#6dec6a !important;">
                    <svg class="svg-inline--fa fa-futbol fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="futbol" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                      <path fill="currentColor"
                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zm-48 0l-.003-.282-26.064 22.741-62.679-58.5 16.454-84.355 34.303 3.072c-24.889-34.216-60.004-60.089-100.709-73.141l13.651 31.939L256 139l-74.953-41.525 13.651-31.939c-40.631 13.028-75.78 38.87-100.709 73.141l34.565-3.073 16.192 84.355-62.678 58.5-26.064-22.741-.003.282c0 43.015 13.497 83.952 38.472 117.991l7.704-33.897 85.138 10.447 36.301 77.826-29.902 17.786c40.202 13.122 84.29 13.148 124.572 0l-29.902-17.786 36.301-77.826 85.138-10.447 7.704 33.897C442.503 339.952 456 299.015 456 256zm-248.102 69.571l-29.894-91.312L256 177.732l77.996 56.527-29.622 91.312h-96.476z"></path>
                    </svg><!-- <i class="fa fa-futbol"></i> --> Activity
                  </button>
                  <button class="btn pull-right send" data-user="Admin" onclick="custom_user_created_new_post(this); return false;">
                    <svg class="svg-inline--fa fa-paper-plane fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                      <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                    </svg><!-- <i class="fa fa-paper-plane"></i> --></button>
                </div>
              </div>
            </div>
            <?php print render($page['content']); ?>
          </div>
          <!--Sidebar Right-->
        </div>
      </div>
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
