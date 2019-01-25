<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-request-actitvity"<?php print $attributes; ?> >
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php print render($content['field_activity']); ?>
  </div>
  <?php
  ?>

</div>