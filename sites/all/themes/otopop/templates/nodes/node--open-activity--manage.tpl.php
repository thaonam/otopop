<?php

?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> node-open-activity-manage clearfix"<?php print $attributes; ?>>
  
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="field-image">
    <?php if (!empty($content['field_image'])): print render($content['field_image']); endif; ?>
  </div>
  <div class="content"<?php print $content_attributes; ?>>
    <div class="activity-title"><?php print $title; ?></div>
    <div class="field-invited">
      Created by <?php echo $node->name; ?>
    </div>
    <div class="list-circle">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="field-description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit
    </div>
    <div class="user-join">
      Lee and 38 friends are going
    </div>
  </div>
  <?php ?>
  <div class="button_action"><a class="btn-join <?php if (!empty($view_joien_activity)): print 'joined'; endif; ?>" href="#" data-nid="<?php print $node->nid; ?>"
                                data-title="<?php print $title; ?>" data-username="<?php print $user->name ?>"
      <?php if (empty($view_joien_activity)): ?> onclick="custom_activity_join(this); return false;"<?php endif; ?>> <?php if (!empty($view_joien_activity)): ?> <i class="fa fa-check"></i> Join<?php else: ?>Join<?php endif; ?></a></div>


</div>