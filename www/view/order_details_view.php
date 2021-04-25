<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>
  <table>
    <tr>
      <th>注文番号</th>
      <th>購入日時</th>
      <th>合計</th>
    </tr>
    <tr>
      <td><?php echo h($order_id); ?></td>
      <td><?php echo h($created[0]['created']); ?></td>
      <td><?php echo h($total_price); ?>円</td>
    </tr>
  </table>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($order_details) > 0){ ?>
    <table>
      <tr>
        <th>商品名</th>
        <th>購入時の価格</th>
        <th>購入数</th>
        <th>小計</th>
      </tr>
      <?php foreach($order_details as $order_detail){?>
      <tr>
        <td><?php echo h($order_detail['name']); ?></td>
        <td><?php echo h($order_detail['price']); ?>円</td>
        <td><?php echo h($order_detail['quantity']); ?>個</td>
        <td><?php echo h($order_detail['price'] * $order_detail['quantity']);?>円</td>
      </tr>
      <?php }?>
    </table>
      <!-- <p class="text-right">合計金額: <?php h(print number_format($total_price)); ?>円</p> -->
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>