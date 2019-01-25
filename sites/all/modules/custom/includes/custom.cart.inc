<?php 
/**
 * @file Custom ubercart functions handler.
 * @creator giaidieu.com
 * @created 20 Jul 2018
 * @updated 20 Jul 2018
 */

/**
 * Create a ubercart order.
 */
function custom_ubercart_order_create($order_status, $payment_method, $product_nids, $customer, $billing, $delivery, $other) {
  // Ubercart module must be enabled.
  if (!module_exists('uc_order')) {return false;}
  
  global $user;
  $items = array();

  foreach ($product_nids as $nid => $value) {
    $item = node_load($nid);
    $item->qty = $value['product_qty'];

    $items[] = $item;
  }
  
  // Use admin account if user not logged in.
  //$account = !$user->uid ? user_load(1) : $user;

  $order = uc_order_new($user->uid);
  $order->order_status = $order_status;
  $order->products = $items;
  $order->payment_method = $payment_method;

  if (!isset($order->primary_email)) {
    $order->primary_email = $other['email'] != '' ? $other['email'] : $user->mail;
  }
  
  $order->field_invoice[LANGUAGE_NONE][0]['value'] = $other['vat'];

  if (!empty($customer)) {
    foreach ($customer as $field_name => $field_value) {
      $order->{$field_name} = $field_value;
    }
  }

  if (!empty($billing)) {
    foreach ($billing as $field_name => $field_value) {
      $order->{$field_name} = $field_value;
    }
  }

  if (!empty($delivery)) {
    foreach ($delivery as $field_name => $field_value) {
      $order->{$field_name} = $field_value;
    }
  }

  //if (!$user->uid) {
    //$order->data['new_user']['pass'] = $form_state['values']['password'];
  //}

  // Create ubercart order.
  uc_order_save($order);
  
  // Save the customer note.
  if ($order->order_id and $other['note'] != '') {
    uc_order_comment_save($order->order_id, $user->uid, $other['note'], 'order');
  }

  return $order;
}

/**
 * Update an order status.
 */
function ubercart_order_update_status($order_id, $order_status) {
  if (!module_exists('uc_order')) {
    return array('is_error' => true, 'message' => 'Có lỗi hệ thống. Vui lòng liên hệ với quản trị để nhận trợ giúp.');
  }

  if (uc_order_update_status($order_id, $order_status)) {
    return array('is_error' => false, 'message' => 'Đã cập nhật trạng thái của đơn hàng thành công.');
  }
  else{
    return array('is_error' => true, 'message' => 'Có lỗi trong lúc xử lý. Xin vui lòng thử lại.');
  }
}

/**
 * Validate a coupon code.
 */
function custom_ubercart_order_discount_validate($code) {
  if (!module_exists('uc_coupon')) {
    return array('is_error' => true, 'message' => 'Có lỗi hệ thống. Vui lòng liên hệ với quản trị để nhận trợ giúp.');
  }
  
  // Get user account.
  return array('is_error' => false, 'data' => uc_coupon_validate($code, false, false));
}

/**
 * Convert coupon code to user_point.
 */
function custom_coupon_to_userpoints($uid, $code) {
  if (!module_exists('uc_coupon') or !module_exists('userpoints')) {
    return array('is_error' => true, 'message' => 'Có lỗi hệ thống. Vui lòng liên hệ với quản trị để nhận trợ giúp.');
  }

  // Load the user account.
  $account = user_load($uid);
  if (!$account) {
    return array('is_error' => true, 'message' => 'Tài khoản thành viên không tồn tại.');
  }
   
  // Check valid coupon.
  $coupon = uc_coupon_validate($code, false, $account);
  if (!$coupon or !$coupon->status) {
    return array('is_error' => true, 'message' => 'Mã tích lũy không hợp lệ hoặc đã được sử dụng rồi.');
  }
  
  // Check in bulk custom list.
  $coupon_bulk_used = variable_get('coupon_bulk_used', array());

  if (in_array($coupon->code, $coupon_bulk_used)) {
    return array('is_error' => true, 'message' => 'Mã tích lũy đã được sử dụng rồi.');
  }

  // Change coupon status.
  $coupon_bulk_used[] = $coupon->code;
  variable_set('coupon_bulk_used', $coupon_bulk_used);
  
  $point = (int) $coupon->value;
  if ($point) {
    module_load_include('inc', 'custom', 'custom.user');
    $result = custom_userpoints_add_points($uid, $point);
    
    if ($result) {
      return array('is_error' => false, 'message' => 'Đã cập nhật thành công.', 'result' => $result);
    }
  }

  return array('is_error' => true, 'message' => 'Có lỗi trong quá trình xử lý.');
}

/**
 * Delete a uc_coupon code.
 */
function custom_coupon_delete($cid) {
  if (!module_exists('uc_coupon')) {
    return array('is_error' => true, 'message' => 'Có lỗi hệ thống. Vui lòng liên hệ với quản trị để nhận trợ giúp.');
  }

  uc_coupon_delete($cid);
  return array('is_error' => false, 'message' => 'Đã xóa Mã khuyến mại thành công.');
}

/**
 * Create / store a coupon.
 */
function custom_coupon_store($uid, $coupon_fields) {
  if (!module_exists('uc_coupon')) {return array('is_error' => true, 'message' => 'Có lỗi hệ thống. Vui lòng liên hệ với quản trị để nhận trợ giúp.');}

  // Init the coupon object.
  $coupon = $coupon_fields['cid'] > 0 ? uc_coupon_load($coupon_fields['cid']) : false;
  
  if (!$coupon) {
    $coupon = new stdClass();
    $coupon->created = time();
    $coupon->max_uses = 1;
    $coupon->bulk = 1;
    $coupon->field_user[LANGUAGE_NONE][0]['target_id'] = $uid;

    $coupon->data = array(
      'bulk_number' => $coupon_fields['bulk_number'],
      'bulk_length' => 8,
      'max_uses_per_user' => 1,
      'apply_to' => 'subtotal',
    );

    if ($coupon_fields['valid_until'] != '') {
      $coupon->valid_from = time();
    }
    else{
      $coupon->valid_from = 0;
    }
  }
  
  $coupon->name = $coupon_fields['name'];
  $coupon->code = $coupon_fields['code'];
  $coupon->type = $coupon_fields['type'];
  $coupon->value = $coupon_fields['value'];
  $coupon->status = $coupon_fields['status'];

  if ($coupon_fields['valid_until'] != '') {
    $coupon->valid_until = strtotime($coupon_fields['valid_until'] . ' 23:59:59');
  }
  else{
    $coupon->valid_until = 0;
  }

  uc_coupon_save($coupon);

  if ($coupon->cid) {
    return array('is_error' => false, 'message' => 'Đã lưu thành công.', 'coupon' => $coupon);
  }
  else{
    return array('is_error' => true, 'message' => 'Có lỗi trong lúc tạo mã. Xin vui lòng thử lại sau.');
  }
}