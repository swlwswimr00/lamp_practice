<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>ご購入ありがとうございました！</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($orders) > 0){ ?>
    <table>
      <tr>
        <th>注文番号</th>
        <th>購入日時</th>
        <th>合計金額</th>
        <th>購入明細</th>
      </tr>
      <?php foreach($orders as $order){?>
      <tr>
        <td><?php echo h($order['order_id']); ?></td>
        <td><?php echo h($order['created']); ?></td>
        <td><?php ?>円</td>
        <td><a href = # <?php ?>>購入明細画面へ</a></td>
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