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
 *
 */
?>
<?php if ($content): ?>
  <div class="block-body " style="background-image: url('<?php if ($image): print render($images_path); endif;?>')">
    <div class="container">
      <?php print $content ?>
    </div>
  </div>
<?php endif; ?>
