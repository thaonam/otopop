<div id="node-<?php print $node->nid; ?>-join"
     class="<?php print $classes; ?> node-open-activity-join clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="field-image">
    <?php if ($node->nid == 24):dsm($node->field_image); endif;
    if (!empty($content['field_image'])): print render($content['field_image']); endif; ?>
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
  <div class="button_action">
    <button class="btn btn-round btn-view pull-right m-t-smd" onclick="custom_view_popup_past_record(<?php print $node->nid; ?>)">
      View
    </button>
  </div>
</div>

<!-- Timer -->
<!--<div id="timer-modal---><?php //print $node->nid; ?><!--" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="form-horizontal" id="exercise-wrapper">-->
<!--        <div class="modal-body text-center">-->
<!--          <h3>--><?php //print $title; ?><!--</h3>-->
<!--          <h5 class="m-t-sm text-muted">Created by --><?php //echo $node->name; ?><!--</h5>-->
<!--          <div class="m-t-lgm gr-action">-->
<!--            <div class="col-md-6">-->
<!--              <button id="btn_start" class="btn-timer active pull-right" onclick="custom_calories_burn_start(this); return false;">START</button>-->
<!--            </div>-->
<!--            <div class="col-md-6">-->
<!--              <button id="btn_stop" class="btn-timer pull-left" disabled="disabled" data-activity="--><?php //print $node->nid; ?><!--" onclick="custom_calories_burn_stop('success', this); return false;">STOP</button>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="clearfix"></div>-->
<!--          <div class="m-t-lg text-center">-->
<!--            <input type="hidden" name="sport_tid" value="--><?php //echo arg(3); ?><!--"/>-->
<!--            <button type="button" class="btn-link small" data-dismiss="modal" aria-label="Close" onclick="custom_calories_burn_stop('cancel', this); return true;">-->
<!--              <span aria-hidden="true">Cancel this activity</span>-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
