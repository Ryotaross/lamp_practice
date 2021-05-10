<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>
  <div class="container">
    <h1>購入履歴</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($historys) > 0){ ?>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>購入明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($historys as $history){ ?>
          <tr>
            <td><?php print ($history['order_id']);?></td>
            <td><?php print($history['order_date']); ?></td>
            <td><?php print(number_format($history['sum(details.item_price * details.quentity)'])); ?>円</td>
            <td>
              <form method="post" action="history_detail.php">
                <input type="submit" value="購入明細表示" class="btn btn-danger delete">
                <input type="hidden" name="order_id" value="<?php print($history['order_id']); ?>">
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>履歴はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>