<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-request-challenge-teaser2"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="row">
    <div class="col-md-2">
      <?php if (!empty($content['field_member'])):  ?>
        <div class="file_opponent"><?php print $content['field_member'][0]['#label'] ?></div>
      <?php endif; ?>
    </div>
    <div class="col-md-6 ">
      
      <?php if (!empty($content['field_result'])): ?>
        <?php if ($content['field_result']['#items'][0]['value'] == '0'): ?>
          <div class="field_result_lose field_result"><span>Lose</span> vs <span>Win</span></div>
        
        <?php elseif ($content['field_result']['#items'][0]['value'] == '1'): ?>
          <div class="field_result_win field_result"><span>Win</span> vs <span>Lose</span></div>
        
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="col-md-2">
      <div
          class="name-author"><?php if (!empty($author->field_full_name)): echo $author->field_full_name['und'][0]['value']; endif; ?></div>
    </div>
    <div class="col-md-2">
      <?php if (!empty($content['field_challenge_type'])) : ?>
        <div class="field_challenge_type"><?php print render($content['field_challenge_type']); ?></div>
      <?php endif; ?>
    </div>
  </div>

</div>

