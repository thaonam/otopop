<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-e-medal-teaser"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="field_img">
    <?php if (!empty($content['field_images'])):
      print render($content['field_images']); endif; ?>
  </div>
  <div class="title">
    <?php print $title; ?>
  </div>
  <div class="field_userpoint-required">
  0 /  <?php print render($content['field_userpoint_required']); ?>
  </div>
  <div class="progress progress-striped active">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
      <span class="sr-only">40% Complete (success)</span>
    </div>
  </div>
</div>
