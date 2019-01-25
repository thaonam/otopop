<div id="node-<?php print $node->nid; ?>"
     class=" node-past-record-teaser <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="col-left">
    <div class="field_img_activity">
      <img
          src="<?php if (!empty($content['field_sport']['#items'][0]['entity']->field_image)) : echo image_style_url('style_65x65', $content['field_sport']['#items'][0]['entity']->field_image['und'][0]['uri']); else: ?>/sites/default/files/styles/style_65x65/public/tai_xuong.png<?php endif; ?> "
          alt="<?php print render($content['field_sport']['#items'][0]['entity']->name) ?>">

    </div>

  </div>
  <div class="col-center">
    <div class="field_meters">
      <?php print number_format(intval($content['field_meters']['#items'][0]['value']) / 1000, 1, '.', ' '); ?> km
    </div>

    <div class="field_map"><i class="fas fa-map-marker-alt"></i> Singapore</div>
  </div>
  <div class="col-right">
    <div class="field_name_activity"><?php print render($content['field_sport']['#items'][0]['entity']->name) ?> </div>
    <div class="field_created"><?php print date('d M Y', $created) ?></div>
  </div>

</div>
