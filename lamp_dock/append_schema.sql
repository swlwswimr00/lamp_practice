CREATE TABLE orders (
  order_id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  primary key(order_id),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE order_details (
  order_id int(11) NOT NULL,
  item_id int(11) NOT NULL,
  price int(11) NOT NULL,
  quantity int(11) DEFAULT 0,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 購入履歴に必要な内容（注文番号・購入日時・該当注文の合計金額）
-- ・orders.order_id
-- ・orders.user_ID
-- ・orders.created
-- ・order_details.item_id
-- ・order_details.price
-- ・order_details.quantity

-- orders.order_id = order_details.order_id 


-- 購入明細に必要な内容（商品名・購入時の商品価格・購入数・小計・注文番号・購入日時・合計金額）
-- ・orders.order_id
-- ・orders.user_ID
-- ・orders.created
-- ・order_details.item_id
-- ・order_details.price
-- ・order_details.quantity
-- ・items.item_name

-- orders.order_id = order_details.order_id 
-- AND order_details.item_id = items.item_id