<?php
/**
 * @file Custom node functions handler.
 */

/**
 * Create a new comment.
 */
function custom_comment_create($nid, $parent_id, $subject, $comment_body, $comment_author, $comment_status) {
  // Module comment must be enabled.
  if (!module_exists('comment')) {
    return 0;
  }
  
  global $user;
  
  $comment = new stdClass();
  $comment->nid = $nid;
  $comment->cid = 0; // leave it as is
  $comment->pid = $parent_cid; // parent comment id, 0 if none
  $comment->uid = $user->uid;
  
  if ($user->mail) {
    $comment->mail = $user->mail;
  }
  
  $comment->name = $comment_author;
  $comment->is_anonymous = $user->uid > 0 ? 0 : 1;
  $comment->homepage = '';
  
  $comment->status = $comment_status;
  $comment->language = LANGUAGE_NONE;
  $comment->subject = $subject;
  $comment->comment_body[LANGUAGE_NONE][0]['value'] = $comment_body;
  $comment->comment_body[LANGUAGE_NONE][0]['format'] = 'plain_text';
  
  comment_submit($comment);
  comment_save($comment);
  
  return $comment->cid ? $comment->cid : 0;
}

/**
 * Create a new node by type.
 *
 * @return: nid.
 */
function custom_node_create($uid, $name, $type, $title = '', $status = 0, $body = '') {
  global $language;
  
  $node = new stdClass();
  $node->type = $type;
  $node->language = $language->language;
  $node->uid = $uid;
  $node->name = $name;
  $node->title = $title == '' ? $name : $title;
  $node->status = $status;
  
  if ($body != '') {
    $node->body[LANGUAGE_NONE][0]['value'] = $body;
    $node->body[LANGUAGE_NONE][0]['format'] = 'full_html';
  }
  
  node_save($node);
  return $node->nid;
}

/**
 * Create / Update a node.
 * $node_fields contains fields used in the update.
 * $node_fields['field_name']['value'] = value.
 */
function custom_node_store($nid, $node_fields) {
  global $user;
  
  // Create a new node if $nid = 0;
  if ($nid == 0 and isset($node_fields['type'])) {
    /**
     * $uid, $name, $type, $title = '', $status = 1, $body = ''
     * Create product service with status 0
     */
    $status = (isset($node_fields['status'])) ? $node_fields['status'] : 0;
    
    // Autocomplete title for open activity.
    if ($node_fields['type'] == 'open_activity') {
      $nid = custom_node_create($user->uid, $user->name, $node_fields['type'], 'Open activity by ' . $user->name, $status);
    }
    else {
      $nid = custom_node_create($user->uid, $user->name, $node_fields['type'], '', $status);
    }
    
    if (!$nid) {
      return array('is_error' => true, 'message' => t('Cannot create a new content.'));
    }
    else {
      // Auto create a self-request for activity.
      if ($node_fields['type'] == 'open_activity') {
        $request_activity_nid = custom_node_create($user->uid, $user->name, 'request_activity', 'Self-request activity by ' . $user->name, 1);
        if ($request_activity_nid) {
          $request_activity = node_load($request_activity_nid);
          $request_activity->field_activity[LANGUAGE_NONE][0]['target_id'] = $nid;
          $request_activity->field_status[LANGUAGE_NONE][0]['value'] = 1;
          node_save($request_activity);
        }
      }
    }
  }
  
  // Load the node for adding more field values.
  $node = node_load($nid);
  if (!$node) {
    return array('is_error' => true, 'message' => t('Node content not found.'));
  }
  if ($node_fields['status_event']) { // check nếu có thì sẽ thực hiện update data: remove value in field_participants
    if (isset($node_fields['field_participants']) && isset($node->field_participants)) {
      if (($key = array_search($node_fields['field_participants'], $node->field_participants['und'])) !== false) {
        unset($node->field_participants['und'][$key]); //remove value
      }
    }
  }
  
  else {
    foreach ($node_fields as $field_name => $field_value) {
      // Common content type fields.
      if (isset($node->{$field_name})) {
        if ($field_name == 'field_date') {
          $node->field_date[LANGUAGE_NONE][0]['value'] = strtotime($field_value);
        }
        else if ($field_name == 'field_address') {
          $node->field_address[LANGUAGE_NONE][0]['value'] = $field_value['address'];
          
          $field_value['lat'] = is_numeric($field_value['lat']) ? $field_value['lat'] : 0;
          $field_value['lng'] = is_numeric($field_value['lng']) ? $field_value['lng'] : 0;
          
          $node->field_geofield[LANGUAGE_NONE][0] = array(
            'geom' => "POINT (" . $field_value['lat'] . " " . $field_value['lng'] . ")",
            'geo_type' => 'point',
            'lat' => $field_value['lat'] . "000000",
            'lon' => $field_value['lng'] . "000000",
            'left' => $field_value['lng'] . "000000",
            'top' => $field_value['lat'] . "000000",
            'right' => $field_value['lng'] . "000000",
            'bottom' => $field_value['lat'] . "000000"
          );
        }
        else if ($field_name == 'field_activity_type') {
          if ($node_fields['type'] == 'open_activity') {
            if ($user->roles[3] == 'webmaster') {
              $node->field_activity_type[LANGUAGE_NONE][0]['value'] = 1;
            }
            else {
              $node->field_activity_type[LANGUAGE_NONE][0]['value'] = 0;
            }
          }
        }
        else if (is_array($field_value)) {
          if ($field_name == 'field_ignore_list' || $field_name == 'field_participants') {
            $number = count($node->{$field_name}[LANGUAGE_NONE]);
            if ($number == 0) {
              $node->{$field_name}[LANGUAGE_NONE][0] = $field_value; // $field_value['value/tid/target_id']
            }
            else {
              $node->{$field_name}[LANGUAGE_NONE]{$number + 1} = $field_value; // $field_value['value/tid/target_id']
            }
          }
          else {
            $node->{$field_name}[LANGUAGE_NONE][0] = $field_value; // $field_value['value/tid/target_id']
          }
        }
        else if ($field_name == 'field_image') {
          $file = file_load($field_value);
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
        else {
          $node->{$field_name} = $field_value;
        }
      }
    }
  }
  
  node_save($node);
  
  if ($node->nid) {
    return array('is_error' => false, 'message' => t('Content has been created successfully.'), 'node' => node_load($node->nid));
  }
  else {
    return array('is_error' => true, 'message' => t('Error occured during the process.'));
  }
}

//Format time ago
function custom_time_elapsed_string($datetime, $full = false) {
  $estimate_time = time() - $datetime;
  
  if ($estimate_time < 1) {
    return 'less than 1 second ago';
  }
  
  $condition = array(
    12 * 30 * 24 * 60 * 60 => 'year',
    30 * 24 * 60 * 60 => 'month',
    24 * 60 * 60 => 'day',
    60 * 60 => 'hour',
    60 => 'minute',
    1 => 'second'
  );
  
  foreach ($condition as $secs => $str) {
    $d = $estimate_time / $secs;
    
    if ($d >= 1) {
      $r = round($d);
      return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
    }
  }
}

//Format number to  x days y hours z mins p secs
function custom_time_format_duration($number, $format) {
  
  if ($format == '') {
    $time = intval($number); // time duration in seconds
    $days = floor($time / (60 * 60 * 24)) != 0;
    $time -= $days * (60 * 60 * 24);
    if ($time != 0) {
      if ($days != 0) {
        $days = $days . 'd';
      }
    }
    $hours = floor($time / (60 * 60)) != 0 ?: '';
    $time -= $hours * (60 * 60);
    if ($time != 0) {
      if ($hours != 0) {
        $hours = $hours . 'hr';
      }
    }
    $minutes = floor($time / 60);
    $time -= $minutes * 60;
    if ($time != 0) {
      if ($minutes != 0) {
        $minutes = $minutes . 'mins';
      }
    }
    $secs = $time;
    if ($time != 0) {
      if ($secs != 0) {
        $secs = $secs . 'secs';
      }
    }
    return $days . ' ' . $hours . ' ' . $minutes . ' ' . $secs;
  }
  elseif ($format == "00:00:00") {
    $result = '';
    
    $seconds = intval($number) % 60;
    $minutes = (intval($number) / 60) % 60;
    $hours = (intval($number) / 3600) % 24;
    $days = intval(intval($number) / (3600 * 24));
    
    if ($days > 0) {
      $result = str_pad($days, 2, '0', STR_PAD_LEFT) . ' : ';
    }
    
    if (($hours > 0) || ($result != "")) {
      $result .= str_pad($hours, 2, '0', STR_PAD_LEFT) . ' : ';
    }
    else {
      $result .= '00 : ';
    }
    
    if (($minutes > 0) || ($result != "")) {
      $result .= str_pad($minutes, 2, '0', STR_PAD_LEFT) . ' : ';
    }
    else {
      $result .= '00 : ';
    }
    
    //seconds aways shown
    $result .= str_pad($seconds, 2, '0', STR_PAD_LEFT);
    return $result;
  }
  
}