<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
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
        <td>
          <form action = <?php print(ORDER_DETAILS_URL);?> method = "get">
            <input type="hidden" name = "order_id"  value = <?php echo h($order['order_id']); ?>> 
            <input type="submit" value = "購入明細へ">
          </form>
        </td>
      </tr>
      <?php }?>
    </table>
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>