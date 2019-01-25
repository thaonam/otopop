/**
 * All functions made for Otopop.
 */
var user_is_exercising = false;
var user_is_exercising_seconds = 0;
var user_is_exercising_handler = null;

/**
 * Function:" to show event choose payment and free*/
function custom_view_event_choose_payment(obj) {
  var nid = jQuery(obj)[0].dataset.nid;
  
  // Call node load via web service.
  custom_services_request('node_load', {nid: nid}, function (node) {
    
    
    var body = (node.body.length > 0) ? node.body.und[0].value : '';
    var price = (node.field_medal_price.length > 0) ? ' - ' + node.field_medal_price.und[0].value : '';
    var message = '   <div id="popup_event" class="popup-event_payment"> <div class="popup-header modal-header-event">\n' +
      '        <h4 class="popup-title" id="exampleModalLabel"> ' + node.title + ' </h4>\n' +
      '        <div class="popup-author">Organised by ' + node.name + '</div>\n' +
      '        <div class="popup-event-location"><i class="fas fa-map-marker"></i> <span></span></div>\n' +
      '      </div>\n' +
      '      <div class="popup-body  modal-body-event">\n' +
      '        <div class="popup-event-desc">' + node.body.und[0].value + '</div>\n' +
      '        <div class="popup-group-select-radio">\n' +
      '          <div class="group-title"></div>\n' +
      '          <ul class="nav nav-tabs">\n' +
      '            <li class=""><a data-toggle="tab" href="#medal"><i class="fa fa-circle" aria-hidden="true"></i> Medal  <span class="modal-price">' + price + '</span></a></li>\n' +
      '            <li class="active"><a data-toggle="tab" href="#free"><i class="fa fa-circle" aria-hidden="true"></i> No Medal - $0 (Free)</a></li>\n' +
      '          </ul>\n' +
      '        </div>\n' +
      '      </div>\n' +
      '      <div class="popup-footer">\n' +
      '        <div class="tab-content">\n' +
      '          <div id="medal" class="tab-pane fade ">\n' +
      '            <a href="#" class="popup-button " data-price="">Process Payment</a>\n' +
      '          </div>\n' +
      '          <div id="free" class="tab-pane fade in active">\n' +
      '            <div class="popup-button btn-join " onclick="custom_user_going_events(this); return false;">Join Now</div>\n' +
      '          </div>\n' +
      '        </div>\n' +
      '      </div> </div>  ';
    
    custom_dialog_confirm_not_button('event_payment', '', message);
  });
}

/**
 * Function to show event on popup.
 */
function custom_view_event_popup(obj) {
  var nid = jQuery(obj)[0].dataset.nid;
  // Call node load via web service.
  custom_services_request('node_load', {nid: nid}, function (node) {
    // console.log(node);
    // console.log(node.field_medal_price);
    
    var event_title = '';
    var price = (node.field_medal_price.length > 0) ? ' - ' + node.field_medal_price.und[0].value : '';
    var check_order = 0
    var order = (check_order > 0) ? '<div class="status">Status: <span>PAID</span></div> <div class="type">Medal <span class="price">' + price + '</span></div>' : '<div class=type> No Medal - $0(Free) </div>';
    // Code HTML Content Node
    var message = ' <div id="popup_event_' + node.nid + '" class="dialog-event">\n' +
      '      <div class="modal-header modal-header-event"> <div class="popup-title">' + node.title + '</div>\n' +
      '        <div class="modal-author">Organised by ' + node.name + '</div>\n' +
      '        <div class="modal-event-location"><i class="fas fa-map-marker"></i> <span>demo</span></div>\n' +
      '      </div>\n' +
      '      <div class="modal-body  modal-body-event">\n' +
      '        <div class="modal-event-desc">' + node.body.und[0].value + '</div>\n' +
      '        <div class="modal-group-select-radio"> ' + order + '\n' +
      '        </div>\n' +
      '      </div> \n' +
      '    </div>';
    jQuery('body').addClass('overlay');
    
    custom_dialog_confirm_change_button('event', event_title, message, 'Start', null, function () {
      custom_view_popup_past_record(node.nid, function () {
        jQuery('.popup_past_record #btn_start').trigger("click");
      });
    });
  });
}

/**
 * Function: to show popup run activity Past Record
 **/
function custom_view_popup_past_record(obj, callback) {
  
  var nid = obj;
  // Call node load via web service.
  custom_services_request('node_load', {nid: nid}, function (node) {
    var event_title = '';
    // console.log(node);
    
    var message = ' <div class="form-horizontal" id="exercise-wrapper"> <div class="btn-close" onclick="custom_cancel_past_record(this); return false;"></div>\n' +
      '        <div class="modal-body text-center"  ><h3 class="popup-title">' + node.title + '</h3>\n' +
      '          <h5 class="m-t-sm text-muted">Created by ' + node.name + '</h5>\n' +
      '          <div class="m-t-lgm gr-action">\n' +
      '            <div class="col-md-6">\n' +
      '              <button id="btn_start" class="btn-timer pull-right" onclick="custom_calories_burn_start(this); return false;">START</button>\n' +
      '            </div>\n' +
      '            <div class="col-md-6">\n' +
      '              <button id="btn_stop" class="btn-timer pull-left" disabled="disabled"  data-tid="' + node.field_sport_type.und[0].tid + '" data-uid="' + node.uid + '" data-nid="' + node.nid + '" data-type="' + node.type + '" onclick="custom_calories_burn_stop(`success`, this); return false;">STOP</button>\n' +
      '            </div>\n' +
      '          </div>\n' +
      '          <div class="clearfix"></div>\n' +
      '          <div class="m-t-lg text-center">' +
      // '<input type="hidden" name="sport_tid" value=" ' + node.field_sport_type.und[0].tid + ' "/>\n' +
      '<a href="#" type="button" class="btn-link small" data-uid="1" data-nid="362" data-type="event" onclick="custom_cancel_past_record(this); return true;">\n' +
      '              <span aria-hidden="true">Cancel this event</span>\n' +
      '            </a>' +
      '          </div>\n' +
      '        </div>\n' +
      '      </div>';
    jQuery('body').addClass('overlay');
    custom_dialog_confirm_not_button('popup_past_record', event_title, message);
    if (typeof callback == 'function') {
      callback();
    }
  });
  
}

/**
 * Funtion Popup Upload Image
 * */
function custom_popup_upload_image(nid) {
  custom_services_request('node_load', {nid: nid}, function (node) {
    var title = '';
    
    var message = '<div class="popup-title"><h3>Thank you for your participation!</h3>\n' +
      '          Upload a photo to complete this even</div>' +
      '<div id="popup_upload" > <div class="popup-body text-center">\n' +
      '          <!--          <input type="file" name="" id="Upload">-->\n' +
      '          <input type="file" name="photo" id="profile-photo" accept="image/*" style="display: none;">\n' +
      '          <div class="banner-camera" id="past-record-photo-upload-trigger" onclick="custom_upload_image(this); return false;">\n' +
      '            <div class="img-upload">\n' +
      '\n' +
      '            </div>\n' +
      '            <i id="photo-from-camera" class="fa fa-camera" aria-hidden="true"></i>\n' +
      '          </div>\n' +
      '        </div>\n' +
      '        <div class="popup-footer">\n' +
      '          <button class="btn-complete" data-uid="' + node.uid + '" data-nid="' + node.nid + '" data-tid="' + node.field_sport_type.und[0].tid + '" data-complete="event-upload" onclick="custom_calories_burn_stop(`success`, this); return true;">Complete</button>\n' +
      '        </div></div> ';
    jQuery('body').addClass('overlay');
    custom_dialog_confirm_not_button('upload_image', title, message);
  });
}

/**
 * Function to start an execise.
 **/
function custom_calories_burn_start(obj,) {
  // Check if already activated, return.
  if (jQuery(obj).hasClass('active')) {
    return false;
  } else {
    jQuery(obj).addClass('active');
  }
  if (!user_is_exercising) {
    user_is_exercising = true;
  }
  console.log('click lại nè', user_is_exercising_seconds);
  if (user_is_exercising_seconds > 0) {
    user_is_exercising_seconds = 0;
  }
  // $obj.closest('.gr-action')
  // Start.
  jQuery(obj).attr('disabled', true);
  jQuery(obj).closest('.gr-action').find("#btn_stop").attr('disabled', false);
  
  user_is_exercising_handler = setInterval(function () {
    user_is_exercising_seconds++;
    console.log('Seconds: ' + user_is_exercising_seconds);
  }, 1000);
  return false;
}

/**
 * Function to start an execise.
 */
function custom_calories_burn_stop(op, elm) {
  user_is_exercising = false;
  clearInterval(user_is_exercising_handler);
  jQuery(elm).attr('disabled', true);
  // console.log(op);
  if (op == 'cancel') {
    if (confirm('Are you sure you want to cancel this activity? It will not be stored into your record.')) {
      jQuery("#btn_start").attr('disabled', false);
      // console.log(jQuery(elm)[0].dataset.modal)
      jQuery(jQuery(elm)[0].dataset.modal).modal("hide");
      return true;
    } else {
    }
  } else if (op == 'success') {
    // Send to server for calculate calories burn and past record update.
    // console.log(jQuery("#exercise-wrapper"));
    var sport_tid = parseInt(jQuery(elm)[0].dataset.tid);
    if (isNaN(sport_tid)) {
      jQuery("#btn_start").attr('disabled', false);
      alert('Sport id not found.');
      return false;
    }
    if (jQuery(elm)[0].dataset.type == 'event') {
      //Show Popup Upload Image
      jQuery.noConflict();
      // console.log(jQuery(elm)[0].dataset.nid);
      custom_popup_upload_image(jQuery(elm)[0].dataset.nid);
      
    } else {
      var fid_image = 0;
      if (jQuery(elm)[0].dataset.complete == 'event-upload') {
        //Get value Image
        fid_image = parseInt(jQuery(elm).closest('#popup_upload').find('#past-record-photo-upload-trigger').attr('fid'));
      }
      if (!fid_image || isNaN(fid_image)) {
        
        var params = {
          seconds: user_is_exercising_seconds,
          sport_tid: sport_tid,
          field_image_fid: ''
        };
      } else {
        // console.log(fid_image);
        var params = {
          seconds: user_is_exercising_seconds,
          sport_tid: sport_tid,
          field_image_fid: fid_image
        };
      }
      
      //Call Web Service
      custom_services_request('calories_burn', params, function (result) {
        var part_record_sport = result['part_record_sport'];
        // Reset.
        user_is_exercising_seconds = 0;
        jQuery("#btn_start").attr('disabled', false);
        
        if (result['is_error']) {
          alert(result['message']);
          return false;
        }
        
        var message = result['message'] + "\n";
        message += "Sport name: " + result['sport_name'] + "\n";
        message += "Hour of activity: " + result['hour'].toFixed(2) + "h\n";
        message += "Distance: " + result['km'].toFixed(2) + "km\n";
        message += "Your weight: " + result['kg'] + "kg\n";
        message += "Calories burn: " + result['calories_burn'].toFixed(2) + "c";
        alert(message);
        
        //Check if the activity node is right?
        // console.log(jQuery(elm));
        if (jQuery(elm)[0].dataset.type === 'open_activity') {
          var params = {
            nid: jQuery(elm)[0].dataset.nid,
            node_fields: {}
          };
          params.node_fields = {
            status: 0,
            type: 'open_activity',
          };
          //Update Node Unpublish
          custom_services_request('node_store', params, function (result) {
            window.location.replace("/user/manage/personal-statistic");
          });
        } else {
          window.location.replace("/user/manage/personal-statistic");
        }
      });
    }
  }
}


function custom_cancel_past_record(elm) {
  if (confirm('Are you sure you want to cancel this activity? It will not be stored into your record.')) {
    user_is_exercising = false;
    clearInterval(user_is_exercising_handler);
    jQuery("#btn_stop").attr('disabled', true);
    jQuery("#btn_start").attr('disabled', false);
    jQuery("#custom-dialog").dialog("close");
    return true;
  } else {
  }
}

/**
 * Function to create a new activity.
 */
function custom_activity_create(obj) {
  var form = jQuery(obj).closest('div#custom-form');
  var activity_date = form.find('input[name="activity_date"]').val().trim();
  var activity_time = form.find('input[name="activity_time"]').val().trim();
  var activity_location = form.find('input[name="activity_location"]').val().trim();
  var activity_participants = parseInt(form.find('input[name="activity_participants"]').val().trim());
  var activity_sport = parseInt(form.find('input[name="activity_sport"]').val().trim());
  
  // Validate.
  if (activity_date == '') {
    alert('Please select a date.');
    return false;
  }
  
  if (activity_time == '') {
    alert('Please enter a time in format of HH:MM.');
    return false;
  } else {
    var params = activity_time.split(/\:/);
    var hour = parseInt(params[0]);
    var minute = parseInt(params[1]);
    
    if (isNaN(hour) || isNaN(minute) || hour < 0 || hour > 23 || minute < 0 || minute > 59) {
      alert('Please enter a time in format of 24hr - HH:MM. For example: 23:59');
      return false;
    }
  }
  
  if (activity_location == '') {
    alert('Please enter an activity location.');
    return false;
  }
  
  if (activity_participants == '' || isNaN(activity_participants)) {
    alert('Please enter a number of participants to be maximum allowed.');
    return false;
  }
  
  if (isNaN(activity_sport)) {
    alert('Activity sport type not found.');
    return false;
  }
  
  // Send to server for creation.
  var node_fields = {
    type: 'open_activity',
    status: 1,
    field_activity_type: {'value': 0},
    field_date: activity_date + ' ' + activity_time,
    field_address: {
      'address': activity_location,
      'lat': form.find('#activity_location_lat').val(),
      'lng': form.find('#activity_location_lng').val()
    },
    field_number_of_participants: {'value': activity_participants},
    field_sport_type: {'tid': activity_sport},
    
  };
  
  jQuery(obj).attr('disabled', true);
  custom_services_request('node_store', {nid: 0, node_fields: node_fields}, function (result) {
    jQuery(obj).attr('disabled', false);
    if (result['is_error']) {
      alert(result['message']);
      return false;
    }
    if (window.location.hash == "#joined-activity") {
      location.reload();
    } else {
      window.location.href += "#joined-activity";
      location.reload();
    }
  });
}

/**
 * Function to joib an activity.
 */
function custom_activity_join(obj) {
  var nid = jQuery(obj)[0].dataset.nid;
  var title = jQuery(obj)[0].dataset.title;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to join this activity ' + title + '?', function () {
    // Create request activity.
    var params = {
      nid: 0,
      node_fields: {}
    };
    
    params.node_fields = {
      title: 'Activity request ' + title,
      status: 1,
      type: 'request_activity',
      field_activity: {'target_id': nid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function to join an group.
 */
function custom_group_join(obj) {
  var nid = jQuery(obj)[0].dataset.nid;
  var title = jQuery(obj)[0].dataset.title;
  var username = jQuery(obj)[0].dataset.username;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to join this Group ' + title + '?', function () {
    // Create request activity.
    var params = {
      nid: 0,
      node_fields: {}
    };
    params.node_fields = {
      title: username + ' requires join group ' + title,
      status: 1,
      type: 'request_group',
      field_group: {'target_id': nid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function to challenge requets accept - decline.
 */
function custom_requets_challenge_join(obj) {
  var confirm = jQuery(obj)[0].dataset.confirm;
  var nid = jQuery(obj)[0].dataset.nid;
  var status = jQuery(obj)[0].dataset.status;
  var title = jQuery(obj)[0].dataset.title;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to ' + confirm + ' this challege ' + title + '?', function () {
    // Create request activity.
    var params = {
      nid: nid,
      node_fields: {}
    };
    params.node_fields = {
      // title: title,
      status: 1,
      type: 'request_challenge',
      field_status: {'value': status}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function to add user.
 */
function custom_add_friend_user(obj) {
  var uid = jQuery(obj)[0].dataset.uid;
  var name = jQuery(obj)[0].dataset.name;
  var user = jQuery(obj)[0].dataset.user;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to make friends with ' + name + ' ?', function () {
    // Create request activity.
    var params = {
      nid: 0,
      node_fields: {}
    };
    params.node_fields = {
      title: user + ' want to make friends width ' + name,
      status: 1,
      type: 'request_friend',
      field_member: {'target_id': uid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function to follow user.
 */
function custom_follow_user(obj) {
  var uid = jQuery(obj)[0].dataset.uid;
  var name = jQuery(obj)[0].dataset.name;
  var user = jQuery(obj)[0].dataset.user;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to follow ' + name + ' ?', function () {
    // Create request activity.
    var params = {
      nid: 0,
      node_fields: {}
    };
    params.node_fields = {
      title: user + ' follow ' + name,
      status: 1,
      type: 'request_follow',
      field_member: {'target_id': uid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function: User Joined Events
 * */
function custom_user_going_events(obj) {
  var uid = jQuery(obj)[0].dataset.uid;
  var nid = jQuery(obj)[0].dataset.nid;
  var title = jQuery(obj)[0].dataset.title;
  
  custom_dialog_confirm('Confirm request', 'Are you sure you want to join this event "' + title + '" ?', function () {
    // Create request activity.
    
    var params = {
      nid: nid,
      node_fields: {}
    };
    params.node_fields = {
      field_participants: {'target_id': uid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/**
 * Function: User does not participate in the event
 * */
function custom_not_attend_event(obj) {
  var uid = jQuery(obj)[0].dataset.uid;
  var nid = jQuery(obj)[0].dataset.nid;
  var title = jQuery(obj)[0].dataset.title;
  
  custom_dialog_confirm('Confirm request', 'Are you sure you don\'t want to participate in this event "' + title + '" ?', function () {
    // Create request activity.
    var params = {
      nid: nid,
      node_fields: {}
    };
    params.node_fields = {
      field_participants: {'target_id': uid},
      status_event: true,
    };
    // Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  
  return false;
}

/*
* Function: User Ignore Event
* */
function custom_user_going_ignore(obj) {
  var uid = jQuery(obj)[0].dataset.uid;
  var nid = jQuery(obj)[0].dataset.nid;
  var name_events = jQuery(obj)[0].dataset.name_events;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to going to ignore this event "' + name_events + '" ?', function () {
    // Create request activity.
    var params = {
      nid: nid,
      node_fields: {}
    };
    params.node_fields = {
      field_ignore_list: {'target_id': uid}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  return false;
}

/*
 * Function Send Create Node Post
 */
function custom_user_created_new_post(obj) {
  var field_body = jQuery(obj).closest('.block-created-post').find('#text-body-post').val();
  var user = jQuery(obj)[0].dataset.user;
  custom_dialog_confirm('Confirm request', 'Are you sure you want to create this post?', function () {
    // Create request activity.
    var params = {
      nid: 0,
      node_fields: {}
    };
    params.node_fields = {
      title: user + ' created post',
      status: 1,
      type: 'post',
      body: {'value': field_body}
    };
    //Function calls Webservice
    custom_services_request('node_store', params, function (result) {
      location.reload(true);
    });
  });
  return false;
}

/*
 * Function click hanlder upload image create new fid
 */
function custom_upload_image(elm) {
  // Click on photo will open file browser.
  // console.log(elm);
  jQuery(elm).prev("#profile-photo").trigger('click');
  custom_file_handler(jQuery(elm).prev("#profile-photo"), {
    min_width: 100,
    min_height: 100,
    url: '/custom/photo-upload'
  }, function (image) {
    // console.log(image);
    jQuery(elm).attr('fid', image.attr('fid'));
    jQuery(elm).find('.img-upload').css('background-image', 'url(' + image.attr('src') + ')');
  });
}
