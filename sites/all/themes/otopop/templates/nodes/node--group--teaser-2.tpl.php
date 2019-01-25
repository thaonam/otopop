<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> node-group-teaser-2 clearfix"<?php print $attributes; ?>>
  
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="field-image">
    <?php print render($content['field_group_cover']); ?>
  </div>
  <div class="content"<?php print $content_attributes; ?>>
    <div class="group-title"><?php print $title; ?>  <i class="fas fa-lock"></i></div>
    <div class="field-unread">
     10+ unread posts
    </div>
  </div>
  <div class="button_action btn-group" role="group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-cog"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="#">Leave Group</a></li>
    </ul>
  </div>


</div>