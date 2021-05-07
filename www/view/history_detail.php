<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>
  <div class="container">
    <h1>購入明細</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($history) > 0){ ?>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print ($history['order_id']);?></td>
            <td><?php print ($history['order_date']); ?></td>
            <td><?php print (number_format($history['sum(details.item_price * details.quentity)'])); ?>円</td>
          </tr>
        </tbody>
      </table>
    <?php } else { ?>
      <p>履歴はありません。</p>
    <?php } ?> 

    <?php if(count($details) > 0){ ?>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($details as $detail){ ?>
          <tr>
            <td><?php print ($detail['item_name']);?></td>
            <td><?php print(number_format($detail['item_price'])); ?>円</td>
            <td><?php print($detail['quentity']); ?>個</td>
            <td><?php print(number_format($detail['item_price * quentity'])); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
    <?php } ?> 
  </div>
</body>
</html>