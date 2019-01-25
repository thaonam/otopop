<?php 
if (!$user->uid or ($user->uid != 1 and !isset($user->roles[3]))) {
  drupal_access_denied();
  exit;
}
?>
<!-- Header -->
<div id="branding" class="col-md-12">
  <div class="pull-left">
    <div id="front"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> <?php print $site_name; ?></a></div>
  </div>
    
  <div id="logged-in-user-wrapper" class="pull-right">
    <i class="fa fa-user" aria-hidden="true"></i> <?php echo t('Hi') . ' <span class="welcome-username">' . $user->name . '</span>'; ?> [<?php echo l(t('Edit'), 'user/' . $user->uid . '/edit'); ?>] [<?php echo l(t('Logout'), 'user/logout'); ?>]
  </div>
</div>

<!-- Body -->
<div id="page" class="webmaster-mode col-md-12 row">
  <div id="body-wrapper">
    <!-- Left bar -->
    <div id="sidebar-first" class="sidebar">
      <?php if ($logo): ?>
      <div id="logo-wrapper"><img id="logo" class="img-responsive" src="<?php print $logo ?>" alt="<?php echo $site_name; ?> Logo" /></div>
      <?php endif; ?>

      <?php print render($page['left']); ?>

      <!-- Footer -->
      <div id="footer">
        <p>&copy; <?php print format_date(time(), 'custom', 'Y'); ?> - OTOPOP</p>
      </div>
    </div>

    <!-- Main -->
    <div id="content" class="main">
      <?php //print $breadcrumb; ?>
      <?php if ($title): ?>
      <h1 class="page-title"><?php print otopopadmin_page_title($title); ?></h1>
      <?php endif; ?>

      <?php if ($messages): ?>
      <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php if ($tabs) echo render($tabs); ?>
      <?php print render($page['content']); ?>
    </div>
  </div>

</div>