<?php $author = user_load($node->uid); ?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-open-activity-teaser2"<?php print $attributes; ?>>
  <div class="field_img">
    <?php  if (!empty($content['field_image'])):print  render($content['field_image']); else: ?>
      <img
          src="/sites/default/files/styles/style_70x70/public/user-photos/young-man-backpack-taking-photo-450w-195491246.jpg"
          class="img-responsive"><?php endif; ?>
  </div>
  <?php print render($title_prefix); ?>
  <div class="field_title"><?php print $title ?></div>
  <?php print render($title_suffix); ?>
  <?php if (!empty($content['field_address'])): ?>
    <div class="field_map"><i class="fas fa-map-marker-alt"></i> <?php print render($content['field_address']) ?></div>
  <?php endif; ?>
  <div class="button_action">
    <a class="btn-join" href="#" data-nid="<?php print $node->nid; ?>"
       data-title="<?php print $title; ?>" onclick="custom_activity_join(this); return false;">Join</a>
  </div>
</div>