<?php

/**
 * @file
 * Default theme implementation to display image block content.
 *
 * Available variables:
 * - $image: Block image.
 * - $content: Block content.
 * - $block: Block object.
 *
 * @see template_preprocess()
 * @see template_preprocess_imageblock_content()
 */
?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <?php if ($image): ?>
        <div class="block-image">
          <?php print $image ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <?php if ($content): ?>
        <div class="block-body">
          <?php print $content ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
