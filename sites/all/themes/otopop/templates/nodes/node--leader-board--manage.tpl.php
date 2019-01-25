<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-leader-board-manage clearfix"<?php print $attributes; ?>>
  <div class="avar-author">
    <img src="<?php if (!empty($author->field_photo)):
      print image_style_url('style_60x60', $author->field_photo['und'][0]['uri']);
    else:
      print "/sites/default/files/styles/style_70x70/public/default_images/no_photo_0.png"; endif; ?>"
         alt="">
  </div>
  <div class="medal">
    <i class="fas fa-medal"></i>
  </div>
  <div class="author-info">
    <div class="author-name"><?php if (!empty($author->field_full_name)): echo $author->field_full_name['und'][0]['value']; else: print  $author->name; endif; ?></div>
    <div class="author-meters-time">
      <span class="field-meters"><?php print number_format(intval($content['field_meters']['#items'][0]['value']) / 1000, 1, '.', '') ?>km</span>
      <span class="field-gym-time"><?php print custom_time_format_duration(intval($content['field_gym_time']['#items'][0]['value']), '') ?></span>
    </div>
  </div>
  <div class="field_created">
    <span><?php print custom_time_elapsed_string($created); ?></span>
  </div>
</div>
