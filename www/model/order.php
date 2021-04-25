<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function regist_orders($db,$user_id,$carts){
  $db -> beginTransaction();
  try{
    insert_orders($db,$user_id);
    $order_id = get_order_id($db);
    foreach($carts as $cart){
      insert_order_details($db,$order_id['last_insert_id()'] ,$cart['item_id'] ,$cart['price'], $cart['amount']);
     }
    $db -> commit();
  }catch(PDOException $e){
    $db -> rollback();
    return false;
  }
}

function insert_orders($db, $user_id){
  $sql = "
    INSERT INTO
      orders(
        user_id
      )
    VALUES(?)
  ";

  return execute_query($db, $sql, array($user_id));
}

function get_order_id($db){
  $sql = "
    SELECT
    last_insert_id()
    FROM
    orders;
  ";

  return fetch_query($db, $sql);
}

function insert_order_details($db,$order_id ,$item_id ,$price, $quantity){
  $sql = "
    INSERT INTO
      order_details(
      order_id,
      item_id,
      price,
      quantity
      )
    VALUES(?,?,?,?)
  ";

  return execute_query($db, $sql, array($order_id, $item_id, $price, $quantity));
}

function get_user_orders($db, $user_id){
  $sql = "
    SELECT
      orders.order_id,
      orders.created
    FROM
      orders
    WHERE
      orders.user_id = ?
  ";

  return fetch_all_query($db, $sql,array($user_id));
}

function get_user_order_details($db, $user_id,$order_id){
  $sql = "
    SELECT
      orders.created,
      order_details.item_id,
      order_details.price,
      order_details.quantity,
      items.name
    FROM
      orders
    JOIN
      order_details
    ON
      orders.order_id = order_details.order_id 
    JOIN
      items
    ON
      order_details.item_id = items.item_id
    WHERE
      orders.user_id = ? AND
      orders.order_id = ?
  ";

  return fetch_all_query($db, $sql,array($user_id, $order_id));
}


function get_all_order_details($db, $user_id){
  $sql = "
    SELECT
      orders.order_id,
      orders.user_id,
      orders.created,
      order_details.item_id,
      order_details.price,
      order_details.quantity,
      items.name
    FROM
      orders
    JOIN
      order_details
    ON
      orders.order_id = order_details.order_id 
    JOIN
      items
    ON
      order_details.item_id = items.item_id
    WHERE
      orders.user_id = ?
  ";

  return fetch_all_query($db, $sql,array($user_id));
}

function sum_order_details($order_details){
  $total_price = 0;
  foreach($order_details as $order_detail){
    $total_price += $order_detail['price'] * $order_detail['quantity'];
  }
  return $total_price;
}

?>