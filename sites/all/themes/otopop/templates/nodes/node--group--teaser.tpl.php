<?php global $user; ?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-group-teaser"<?php print $attributes; ?>>

  <!--  --><?php //if ($node->nid == "58"):dsm($content); endif; ?>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="row">
    <div class="col-md-2">

      <div class="field_img">
        <?php if ($content['field_group_cover']): print render($content['field_group_cover']) ?>
        
        <?php else: ?>
          <img src="/sites/all/themes/otopop/images/exercise.png" class="img-responsive">  <?php endif; ?>
      </div>

    </div>
    <div class="col-md-1">
      <div class="field_date">
        <span><?php print date('d', $created) ?></span>
        <span><?php print date('M', $created) ?></span>
      </div>
    </div>
    <div class="col-md-7 field_content">
      <div class="field-title" <?php print $title_attributes; ?>><?php print $title; ?></div>
      <?php if (!empty($content['field_address'])): ?>
        <div class="field_map">
          <i class="fas fa-map-marker-alt"></i> <?php print render($content['field_address']) ?></div>
      <?php endif; ?>

    </div>
    <div class="col-md-2">
      <div class="button_action"><a class="btn-join" href="#" data-nid="<?php print $node->nid; ?>"
                                    data-title="<?php print $title; ?>" data-username="<?php print $user->name ?>"
                                    onclick="custom_group_join(this); return false;">Join</a>
      </div>
    </div>
  </div>