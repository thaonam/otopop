<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-request-challenge-teaser"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="row">
    <div class="col-md-2">

      <div class="field_img">
        <?php if ($author->field_photo): ?>
          <img src="<?php print  image_style_url('style_70x70', $author->field_photo['und'][0]['uri']); ?>"
               alt="">
        <?php else: ?>
          <img src="/sites/all/themes/otopop/images/exercise.png" class="img-responsive">  <?php endif; ?>
      </div>

    </div>
    <div class="col-md-10 field_content">
      <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
      <div class="info-field">
        <?php if (!empty($content['field_challenge_type'])): ?>
          <div class="field_challenge_type">
            <i class="fas fa-bookmark"></i>
            <?php print render($content['field_challenge_type']) ?> challenge
          </div>
        <?php endif; ?>
        <?php if (!empty($content['field_challenge_distance'])): ?>
          <div class="field_challenge_distance">
            <?php print  number_format(intval($content['field_challenge_distance']['#items'][0]['value']) / 1000, 1, '.', ' '); ?>
            km
          </div>
        
        <?php endif; ?>
        <?php if (!empty($content['field_challenge_time'])): ?>
          <?php $time = intval($content['field_challenge_time']['#items'][0]['value']); // time duration in seconds
//          dsm($time);
          $days = floor($time / (60 * 60 * 24)) != 0 ? floor($time / (60 * 60 * 24)) . ' days' : '';
          $time -= $days * (60 * 60 * 24);
          
          $hours = floor($time / (60 * 60)) != 0 ? floor($time / (60 * 60)) . ' hours' : '';
          $time -= $hours * (60 * 60);
          
          $minutes = floor($time / 60);
          if ($minutes == 0 && $hours == 0 && $days == 0) {
            $time -= $minutes * 60;
            $seconds = floor($time);
            $time -= $seconds;
            $minutes = $seconds . ' secs';
          }
          else {
            $minutes = $minutes . ' mins';
          }
          ?>
          <div class="field_challenge_time"> <?php echo "{$days} {$hours} {$minutes} "; ?>
          </div>
        <?php endif; ?>
      </div>
      <!--      data-title=" Challenge --><?php //print $title; ?><!-- by -->
      <?php //print  $author->field_full_name['und'][0]['value'] ?><!-- - -->
      <?php //print render($content['field_member'][0]['#label']); ?><!--"-->
      <div class="group-btn">
        <div class="button_action">
          <a class="btn-accept" href="#" data-nid="<?php print $node->nid; ?>"
             data-status="1"
             data-confirm="accept"
             onclick="custom_requets_challenge_join(this); return false;">Accept</a>
          <a class="btn-decline" href="#" data-nid="<?php print $node->nid; ?>"
             data-status="0"
             data-confirm="decline"
             onclick="custom_requets_challenge_join(this); return false;">Decline</a>
        </div>

      </div>
    </div>
  </div>


</div>