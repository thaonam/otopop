<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix node-event-join"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="d-flex">
    <div class="field_date">
      <span class="date"><?php if (!empty($node->field_event_date)): print date('d M', $node->field_event_date['und'][0]['value']); endif; ?></span>
      <span class="time"><?php if (!empty($node->field_event_date)): print date('ga', $node->field_event_date['und'][0]['value']); endif; ?></span>
    </div>
    <div class="field_content">
      <div class="field-title"><?php print $title; ?></div>
      <!----><?php //if (!empty($content['field_address'])): ?>
      <!--  <div class="field_map"><i class="fas fa-map-marker-alt"></i> --><?php //print render($content['field_address']) ?>
      <!--  </div>-->
      <!----><?php //endif; ?>
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
    <div class="event-right">
      <?php if (!empty($content['field_address'])): ?>
        <!--<div class="field_map"><i class="fas fa-map-marker-alt"></i> --><?php //print render($content['field_address']) ?><!--</div>-->
      <?php endif; ?>
      <div class="button_action">
        <div class="btn btn-round btn-view pull-right m-t-smd" onclick="custom_view_popup_past_record(<?php print $node->nid; ?>)">Start</div>

        <div class="btn btn-round btn-view pull-right m-t-smd"
             data-nid="<?php print $node->nid ?>"
             data-title="<?php print $title ?>"
             data-uid="<?php print render($account->uid) ?>"
             onclick="custom_view_event_popup(this); return false;"> View
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Timer -->
<!--<div id="timer-modal---><?php //print $node->nid; ?><!--" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="form-horizontal" id="exercise-wrapper">-->
<!--        <div class="modal-body text-center">-->
<!--          <h5 class="m-t-sm text-muted">Created by --><?php //echo $node->name; ?><!--</h5>-->
<!--          <div class="m-t-lgm gr-action">-->
<!--            <div class="col-md-6">-->
<!--              <button id="btn_start" class="btn-timer active pull-right" onclick="custom_calories_burn_start(this); return false;">START</button>-->
<!--            </div>-->
<!--            <div class="col-md-6">-->
<!--              <button id="btn_stop" class="btn-timer pull-left" disabled="disabled" data-event_id="--><?php //print $node->nid; ?><!--" data-type="--><?php //print $node->type; ?><!--" onclick="custom_calories_burn_stop('success', this); return false;">STOP</button>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="clearfix"></div>-->
<!--          <div class="m-t-lg text-center">-->
<!--            --><?php //?>
<!--            <input type="hidden" name="sport_tid" value="--><?php //if (!empty($content['field_sport_type'])): print $content['field_sport_type']['#items'][0]['tid']; endif; ?><!--"/>--><?php //?>
<!--            <a href="#" data-modal="#timer-modal---><?php //print $node->nid; ?><!--" type="button" class="btn-link small" data-uid="--><?php //print $node->uid; ?><!--" data-event_id="--><?php //print $node->nid; ?><!--" data-type="--><?php //print $node->type; ?><!--" onclick="custom_cancel_past_record( this); return true;">-->
<!--              <span aria-hidden="true">Cancel this event</span>-->
<!--            </a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
