<div class="<?php print $classes; ?>">

  <div class="panel panel-default block-created-post ">
    <div class="panel-body bg-gray">
      <div><textarea class="form-control bg-gray no-border" id="text-body-post" placeholder="What activity have you done today?"></textarea></div>
      <hr>
      <div>
      <button class="btn" style="background-color:#94b8f3 !important;"><i class="fa fa-camera"></i> Photo/Video</button>
      <button class="btn" style="background-color:#eab054 !important;"><i class="fa fa-smile"></i> Sticker/Emoji</button>
      <button class="btn" style="background-color:#6dec6a !important;"><i class="fa fa-futbol"></i> Activity</button>
        <button class="btn pull-right send" data-user="<?php if (!empty($account)): if (!empty($account->field_full_name)): print $account->field_full_name['und'][0]['value']; else: print $account->name; endif;endif; ?>" onclick="custom_user_created_new_post(this); return false;"><i
              class="fa fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
  
  
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>
  
  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>
  
  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>
  
  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>