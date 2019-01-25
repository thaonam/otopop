<?php /* All custom functions. */

/**
 * Test page.
 */
function custom_test() {
  return 'Test!';
}

/**
 * Calculate calories burn.
 */
function custom_calories_burn($seconds, $sport_tid, $field_image_fid, $store_to_record = true) {
  global $user;
  $account = user_load($user->uid);
  
  // Get weight.
  $kg = !empty($account->field_weight[LANGUAGE_NONE]) ? $account->field_weight[LANGUAGE_NONE][0]['value'] : 0;
  if (!$kg) {
    return array('is_error' => true, 'message' => 'You have not had a weight value. Please update your profile.');
  }
  
  // Sport.
  $sport = taxonomy_term_load($sport_tid);
  if (!$sport) {
    return array('is_error' => true, 'message' => 'Sport not found.');
  }
  
  // Get a faked kilometer per hour this user has done base on his $seconds input.
  $list = array();
  switch ($sport_tid) {
    // Cycling.
    case 92:
      $list = array(
        16.0 => 0.25,
        19.2 => 0.3,
        22.4 => 0.35,
        25.6 => 0.4,
        32.0 => 0.4,
        32.0 => 0.5,
      );
      
      break;
    
    // Running.
    case 93:
      $list = array(
        8.0 => 1.05,
        8.3 => 1.05,
        9.6 => 1.1,
        10.7 => 1.1,
        11.2 => 1.1,
        12.0 => 1.1,
        12.8 => 1.15,
        13.8 => 1.15,
        14.4 => 1.15,
        16.0 => 1.15,
        17.4 => 1.15,
      );
      
      break;
    
    // Walking
    case 94:
      $list = array(
        3.2 => 0.8,
        4.0 => 0.75,
        4.8 => 0.7,
        5.6 => 0.7,
        6.4 => 0.75,
        7.2 => 0.9,
        8.0 => 1,
      );
      
      break;
  }
  
  if (empty($list)) {
    return array('is_error' => true, 'message' => 'This calories burn calculation is available for Cycling, Running, or Walking exercise only.');
  }
  
  // Pick random one for calculating.
  $kmh = array_rand($list);
  $rate = $list[$kmh];
  
  // Convert seconds to hour.
  $hour = $seconds / 60 / 60;
  
  // Get total of kilometters.
  $km = $kmh * $hour;
  
  // Get calories value.
  $calories_burn = $km * $kg * $rate;
  if ($store_to_record) {
    // Store to node.
    $node = new stdClass();
    $node->language = LANGUAGE_NONE;
    $node->uid = $user->uid;
    $node->name = $user->name;
    $node->type = 'past_record';
    $node->title = 'Past record for ' . $user->name;
    $node->status = 1;
    
    $node->field_sport[LANGUAGE_NONE][0]['target_id'] = $sport_tid;
    $node->field_meters[LANGUAGE_NONE][0]['value'] = $km * 1000;
    $node->field_gym_time[LANGUAGE_NONE][0]['value'] = $seconds;
    $node->field_calories_burn[LANGUAGE_NONE][0]['value'] = $calories_burn;
    //  field_image
    if (!empty($field_image_fid)) {
      $file = file_load($field_image_fid);
      if ($file) {
        $file->status = 1;
        file_save($file);
        
        // Remove current file if exist.
        if (!empty($node->field_image[LANGUAGE_NONE])) {
          drupal_unlink($node->field_image[LANGUAGE_NONE][0]['uri']);
        }
        $node->field_image[LANGUAGE_NONE][0] = (array)$file;
      }
    }
    
    /*Node Create Save*/
    node_save($node);
    
  }
  
  return array('is_error' => false, 'message' => 'You have done your activity.', 'sport_name' => $sport->name, 'hour' => $hour, 'km' => $km, 'kg' => $kg, 'calories_burn' => $calories_burn, 'part_record_sport' => $node->field_sport['und'][0]['target_id']);
}

