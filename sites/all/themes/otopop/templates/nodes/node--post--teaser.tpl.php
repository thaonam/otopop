<?php
/**
 *$author
 * @see custom_preprocess_node
 *
 **/
?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-post-teaser"<?php print $attributes; ?>>
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
    <div class="row align-items-start">
        <div class="author col-md-2 d-flex align-items-center justify-content-center">
            <div class="avar-author">
                <img src="<?php if (!empty($author->field_photo)):
                  print image_style_url('style_70x70', $author->field_photo['und'][0]['uri']);
                else:
                  print "/sites/default/files/styles/style_40x40/public/default_images/no_photo_0.png"; endif; ?>"
                     alt="">
            </div>
            <div class="name-author"><?php if (!empty($author->field_full_name)): echo $author->field_full_name['und'][0]['value']; endif; ?></div>
        </div>

        <div class="post-content col-md-6"<?php print $content_attributes; ?>>
            <a class="field-body socialise" href="<?php print $node_url; ?>"> <?php print render($content['body']); ?></a>
            <div class="list-action">
                <a class="btn-like" href=""><i class="fas fa-thumbs-up"></i>
                    Like</a>
                <a class="btn-comt" href=""><i class="fas fa-comment-dots"></i>
                    Comment</a>
                <a class="btn-share" href=""><i class="fas fa-share-alt"></i> Share</a>
            </div>
        </div>

        <div class="list-img col-md-4">
          <?php if (!empty($content['field_images'])): ?>
          
              <div class="list-img_title">Photos</div>
            <?php print  render($content['field_images']); ?>
          <?php endif; ?>
        </div>
    </div>
</div>
