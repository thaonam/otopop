<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-past-record-full clearfix"<?php print $attributes; ?>>

  <div class="part_record-breacumb">
    <div class="bc-left">
      <span><a class="btn-back" href="/user/manage/personal-statistic"><i class="fa fa-chevron-left"></i></a></span>
      <span class="part_record-type">
        <?php if (!empty($content['field_sport'])): $sport = taxonomy_term_load($content['field_sport']['#items'][0]['target_id']); ?>
          <img src="<?php print image_style_url('style_40x40', $sport->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
        <?php endif; ?></span>
      <?php print render($content['field_sport']) ?>
    </div>
    <div class="bc-right">
      <span><i class="fa fa-calendar-alt"></i> Standard Chart Event</span>
      <span><i class="fas fa-map-marker-alt"></i> Kallang</span>
      <span><i class="fas fa-clock"></i> 02/01/2019 - 10:00AM</span>
    </div>
  </div>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <div class="part_record-params">
    <div class="field-meters"> <?php if (!empty($content['field_meters'])): print  number_format(intval($content['field_meters']['#items'][0]['value']) / 1000, 1, '.', ' '); endif; ?> <span>(Distance) km</span></div>
    <div class="field-calories"><?php if (!empty($content['field_calories_burn'])): print  number_format((float)$content['field_calories_burn']['#items'][0]['value'], 1, '.', ' '); endif; ?><span>Calories</span></div>
    <div class="field-time"><?php if (!empty($content['field_gym_time'])): print custom_time_format_duration($content['field_gym_time']['#items'][0]['value'], '00:00:00'); endif; ?> <span>Duration</span></div>
  </div>
  <div class="part_record-info_other row">
    <div class="left col-md-6">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/clock.png" alt="" class="img-responsive">Averge Pace</td>
            <td>10:41 min/km</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/paint.png" alt="" class="img-responsive">Average Speed</td>
            <td> 5.6kph</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/paint-1.png" alt="" class="img-responsive">Max. Speed</td>
            <td> 12.5kph</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/step.png" alt="" class="img-responsive">Average Steps</td>
            <td>121 steps/min</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/step-1.png" alt="" class="img-responsive">Steps Length</td>
            <td>195 steps/min</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/step-2.png" alt="" class="img-responsive">Max Steps</td>
            <td>0.8m</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/Elevation.png" alt="" class="img-responsive">Elevation Gain</td>
            <td>44m</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/Elevation-1.png" alt="" class="img-responsive">Elevation Loss</td>
            <td>40m</td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/Elevation-2.png" alt="" class="img-responsive">Max. Elevation</td>
            <td><span class="premium">Go Premium</span></td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/heart.png" alt="" class="img-responsive">Average Heart Rate</td>
            <td><span class="premium">Go Premium</span></td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/heart-1.png" alt="" class="img-responsive">Max. Heart Rate</td>
            <td><span class="premium">Go Premium</span></td>
          </tr>
          <tr>
            <td><img src="/sites/all/themes/otopop/images/icon-past-record/cup-1.png" alt="" class="img-responsive">Dehydration</td>
            <td><span class="premium">Go Premium</span></td>
          </tr>
        </table>
      </div>

    </div>
    <div class="right col-md-6">
      <div class="block-image">
        <div class="file">
          <i class="fa fa-camera"></i>
          upload photo
        </div>
      </div>
      <div class="block-weather">
        <div class="weather-current">
          <span> <img src="/sites/all/themes/otopop/images/icon-past-record/weather.png" alt=""> 32 &#176 C </span>
          <span> <img src="/sites/all/themes/otopop/images/icon-past-record/weather-1.png" alt=""> 40 kph</span>
          <span> <img src="/sites/all/themes/otopop/images/icon-past-record/weather-2.png" alt=""> 70%</span>
        </div>
        <div class="part_record-share">
          <div class="share-title">Share Your Success</div>
          <div class="share-text">
            Inspire others to get more active by sharing your hard work
          </div>
          <a href="" class="btn btn-share"> <i class="fas fa-share-alt"></i> Share</a>
        </div>
      </div>
    </div>
  </div>
</div>
