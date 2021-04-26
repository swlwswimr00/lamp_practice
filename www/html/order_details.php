<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_get('order_id');

if(is_admin($user)){
  $user_id = get_get('user_id');
}else{
  $user_id = $user['user_id'];
}

$order_details = get_user_order_details($db, $user_id, $order_id);

$created = get_created_orders($db,$order_id);
$total_price = sum_order_details($order_details);

include_once '../view/order_details_view.php';
