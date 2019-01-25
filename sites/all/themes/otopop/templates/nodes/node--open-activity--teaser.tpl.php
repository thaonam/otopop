<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-open-activity-teaser"<?php print $attributes; ?>>
  
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="row">
    <div class="col-md-2">

      <div class="field_img">
        <?php if ($author->field_photo): ?>
          <img src="<?php print  image_style_url('style_70x70', $author->field_photo['und'][0]['uri']); ?>"
               alt="">
        <?php else: ?>
          <img src="/sites/all/themes/otopop/images/exercise.png" class="img-responsive">  <?php endif; ?>
      </div>

    </div>
    <div class="col-md-1">
      <div class="field_date">
        <span><?php print date('d', $node->field_date['und'][0]['value']) ?></span>
        <span><?php print date('M', $node->field_date['und'][0]['value']) ?></span>
      </div>
    </div>
    <div class="col-md-9 field_content"><h2<?php print $title_attributes; ?>>
        <a href="/user/manage/activity/<?php print render($content['field_sport_type']['#items'][0]['tid']) ?>#tab_joined-activity"><?php print $title; ?></a></h2>
      <?php if (!empty($content['field_address'])): ?>
      <div class="field_map">
        <i class="fas fa-map-marker-alt"></i> <?php print render($content['field_address']) ?></div>
    </div>
    <?php endif; ?>
  </div>
</div>

