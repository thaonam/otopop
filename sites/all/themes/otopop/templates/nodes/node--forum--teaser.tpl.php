<?php

/**
 * @file
 * block 45- Forum Page Socialise
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-forum-teaser clearfix"<?php print $attributes; ?>>
  
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="node-head">
    <div class="created"><?php print date('d M Y  h:m', $created); ?></div>
    <div class="author">Posted by
      <img src="<?php if (!empty($author->field_photo)):
        print image_style_url('style_40x40', $author->field_photo['und'][0]['uri']);
      else:
        print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>" alt="">
      <span class="author-name"><?php if (!empty($author->field_full_name)): echo $author->field_full_name['und'][0]['value']; endif; ?> </span>
    </div>
  </div>

  <div class="content"<?php print $content_attributes; ?>>
    <div class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></div>
    <div class="body">
      <?php if (!empty($content['body']['#items'][0]['summary'])): print render($content['body']['#items'][0]['summary']);
      else:
        print  truncate_utf8(strip_tags($node->body['und'][0]['value']), 100) . "...";endif; ?>
    </div>
  </div>

</div>
