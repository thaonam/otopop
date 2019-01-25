<div id="page-wrapper" class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">
  <div class="img-invite">
    <div class="clearfix">
      <img src="/sites/all/themes/otopop/images/invite_friends/logo2.png" style=" display: block; max-width: 200px; height: 150px; margin-left:auto; margin-right: auto;">
    </div>
  </div>
  <!-- Page Header -->
  <div class="masthead">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="block-text">
          <div class="text-center">
            <div class="description">
              Happy to have you on board,
              <br>
              <?php if (!empty($account)): if (!empty($account->field_full_name)): print  $account->field_full_name['und'][0]['value']; else: print $account->name; endif; endif; ?>
            </div>
            <?php if (!empty($account)): ?>
              <img src="<?php if (!empty($account->field_photo)):print image_style_url('style_100x100', $account->field_photo['und'][0]['uri']); else: print "/sites/default/files/styles/style_100x100/public/default_images/no_photo_0.png"; endif; ?>" alt="">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page -->
  <div id="page" class="clearfix">
    <?php if ($page['left']): ?>
      <div id="left" class="sidebar left">
        <?php print render($page['left']); ?>
      </div>
    <?php endif; ?>

    <div id="content" class="content-wrapper clearfix">
      <!-- Main Content -->
      <div class="container">
        
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        
        <?php if ($messages) print $messages; ?>
        <?php if ($tabs) print render($tabs); ?>
        <?php if ($breadcrumb) print render($breadcrumb); ?>
        
        <?php print render($page['content']); ?>


        <div class="row margin-top-50 block-btn-invite">
          <div class="col-md-6 text-right">
            <a class="btn btn-primary btn-sm" role="button" data-toggle="collapse" href="#emailInvite" aria-expanded="false" aria-controls="collapseExample">Invite Friends via Email</a>
          </div>
          <div class="col-md-6">
            <div class="col-md-4">
              <div id="fb-root" class=" fb_reset">
                <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                  <div>
                    <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1"
                            src="https://staticxx.facebook.com/connect/xd_arbiter/r/j-GHT1gpo6-.js?version=43#channel=f331a83211e3db&amp;origin=http%3A%2F%2Fotopop.mx.sg" style="border: none;"></iframe>
                  </div>
                  <div>
                    <iframe name="fbe86f69f16614" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media"
                            src="https://www.facebook.com/connect/ping?client_id=831029930345963&amp;domain=otopop.mx.sg&amp;origin=1&amp;redirect_uri=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fj-GHT1gpo6-.js%3Fversion%3D43%23cb%3Df9f375beafa434%26domain%3Dotopop.mx.sg%26origin%3Dhttp%253A%252F%252Fotopop.mx.sg%252Ff331a83211e3db%26relation%3Dparent&amp;response_type=token%2Csigned_request&amp;sdk=joey"
                            style="display: none;"></iframe>
                  </div>
                </div>
              </div>
              <div class="fb-login-button fb_iframe_widget" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true" login_text="" fb-xfbml-state="rendered"
                   fb-iframe-plugin-query="app_id=831029930345963&amp;auto_logout_link=true&amp;button_type=continue_with&amp;container_width=0&amp;locale=en_US&amp;max_rows=1&amp;sdk=joey&amp;show_faces=false&amp;size=medium&amp;use_continue_as=true"><span
                    style="vertical-align: bottom; width: 181px; height: 28px;">
                  <iframe name="fbb65be18b256" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:login_button Facebook Social Plugin"
                          src="https://www.facebook.com/v2.8/plugins/login_button.php?app_id=831029930345963&amp;auto_logout_link=true&amp;button_type=continue_with&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fj-GHT1gpo6-.js%3Fversion%3D43%23cb%3Df30f0f56bde0ab4%26domain%3Dotopop.mx.sg%26origin%3Dhttp%253A%252F%252Fotopop.mx.sg%252Ff331a83211e3db%26relation%3Dparent.parent&amp;container_width=0&amp;locale=en_US&amp;max_rows=1&amp;sdk=joey&amp;show_faces=false&amp;size=medium&amp;use_continue_as=true"
                          style="border: none; visibility: visible; width: 181px; height: 28px;" class=""></iframe></span></div>
            </div>
            <div class="col-md-8 text-left">
              <a href="#" onclick="send_invite_to_friends()" class="btn btn-primary btn-sm hide" id="inviteFBFriends">
                Invite Facebook Friends
              </a>
            </div>
          </div>
        </div>

        <div class="row collapse" id="emailInvite">
          <div class="col-md-8 col-md-offset-2">
            <h3 class="lead">Invite Friends</h3>
            <div class="well">
              <form action="email_invites.php" method="post">
                <div class="form-group">
                  <input class="form-control" type="email" name="email[]" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email[]" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email[]" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email[]" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email[]" placeholder="Email Address">
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-primary ">Send Invites</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row text-center margin-top-100">
          <a href="/user/profile" class="btn-continue">
            Continue
            <svg aria-hidden="true" data-prefix="fal" data-icon="arrow-circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-arrow-circle-right ">
              <path fill="currentColor"
                    d="M8 256c0 137 111 248 248 248s248-111 248-248S393 8 256 8 8 119 8 256zM256 40c118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216zm12.5 92.5l115.1 115c4.7 4.7 4.7 12.3 0 17l-115.1 115c-4.7 4.7-12.3 4.7-17 0l-6.9-6.9c-4.7-4.7-4.7-12.5.2-17.1l85.6-82.5H140c-6.6 0-12-5.4-12-12v-10c0-6.6 5.4-12 12-12h190.3l-85.6-82.5c-4.8-4.7-4.9-12.4-.2-17.1l6.9-6.9c4.8-4.7 12.4-4.7 17.1 0z"
                    class=""></path>
            </svg>
          </a>
        </div>
      </div> <!--\ div.container -->
    </div>
    
    <?php if ($page['right']): ?>
      <div id="right" class="sidebar right">
        <?php print render($page['right']); ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Footer -->
  <footer id="footer" class="clearfix footer">
    <div class="content-wrapper">
      <div class="container">
        
        <?php print render($page['footer']); ?>
      </div>

    </div>
  </footer>
</div>
