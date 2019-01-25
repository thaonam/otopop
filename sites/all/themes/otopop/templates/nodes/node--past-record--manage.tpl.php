<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-past-record-manage clearfix"<?php print $attributes; ?>>
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  
  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>
  <div class="field_sport">
    <?php if (!empty($content['field_sport'])): $sport = taxonomy_term_load($content['field_sport']['#items'][0]['target_id']); ?>
      <img src="<?php print image_style_url('style_70x70', $sport->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
    <?php endif; ?>
  </div>
  <div class="past_record-info">
    <div class="past_record-figures">
      <div class="field_meters"><?php if (!empty($content['field_meters'])): print  number_format(intval($content['field_meters']['#items'][0]['value']) / 1000, 1, '.', ' '); endif; ?> <span>km</span></div>
      <div class="field-calories"><?php if (!empty($content['field_calories_burn'])): print  number_format((float) $content['field_calories_burn']['#items'][0]['value'], 1, '.', ' '); endif; ?><span>cals</span></div>
      <div class="field-time"><?php if (!empty($content['field_gym_time'])): print custom_time_format_duration($content['field_gym_time']['#items'][0]['value'], '00:00:00'); endif; ?> </div>

    </div>
    <div class="past_record-other">
      <span><i class="fa fa-calendar-alt"></i> Standard Chart Event</span>
      <span><i class="fas fa-map-marker-alt"></i> Kallang</span>
    </div>
  </div>
  <div class="past_record-right">
    <div class="field_created">
      <?php if (date('A', $created) == "AM"): ?>
        <i class="fas fa-sun"></i>
      <?php elseif (date('A', $created) == "PM"): ?>
        <i class="fas fa-moon"></i>
      <?php endif; ?>
      <span> <?php print date('d M Y', $created) ?></span>
    </div>
    <div class="field_link">
      <a href="<?php print $node_url; ?>"><i class="fa fa-chevron-right"></i></a>
    </div>
  </div>
</div>
