<div id="page-wrapper"
     class="<?php if ($page['left']): echo ' sidebar-left'; endif; ?><?php if ($page['right']): echo ' sidebar-right'; endif; ?>">

  <!--Header-->
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
            <a class="navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
               rel="home"
               id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"/>
            </a>
          <?php endif; ?>
        </div>
        <?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
          <div class="navbar-collapse collapse" id="navbar-collapse">
            <nav role="navigation">
              <?php if (!empty($primary_nav)): ?>
                <?php print render($primary_nav); ?>
              <?php endif; ?>
              <?php if (!empty($page['navigation'])): ?>
                <?php print render($page['navigation']); ?>
              <?php endif; ?>
              <?php if ($logged_in) : ?>
              <?php else: ?>
                <ul class="nav navbar-nav navbar-right button-login">
                  <li>
                    <a href="/">Sign in</a>
                  </li>
                </ul>
              <?php endif; ?>
            </nav>
          </div>
        <?php endif; ?>
      </div>
    </nav>

  </header>


  <!--Main Content-->
  <div class="content-wrapper  <?php print $container_class; ?>">
    <div class="row">
      <?php  if (!empty($messages)): ?>
      <div class="col-md-12">
        <?php print $messages; ?>
      </div>
      <?php endif; ?>
      <!--Section Left SideBar-->
      <aside class="col-md-5 sidebar-left">
        <h1 class="page-title"> Register your account</h1>
      </aside>

      <!--Section Main Content-->
      <section class="col-md-7 content">
        <div class="row">

          <!--From Content-->
          <div class="col-md-7">
            <?php print render($page['content']); ?>
          </div>

          <div class="line-or">Or</div>

          <!--Section Right SideBar-->
          <aside class="col-md-5 sign-in__social">
            <h2>Sign up <span>via</span></h2>
            <ul class="custom-social-list">
              <li rel="facebook" id="facebookSignin">Facebook</li>
              <li rel="google" id="googleSignIn">Google</li>
            </ul>
          </aside>
        </div>
      </section>
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