<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>

  <div class="container">
  <form method="get">
    <select name="sort">
      <option value="new">新着順</option>
      <option value="low_cost">価格安い順</option>
      <option value="high_cost">価格高い順</option>
    </select>
    <input type="submit" name="run" value="並び替え">
  </form>
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print($item['item_id']); ?>">
                    <input type="hidden" name="token" value="<?php print $token;?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <?php if($count_page > 1){?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php if($page > 1){?>
            <li class="page-item">
              <a class="page-link" href="index.php?sort=<?php print $sort;?>&page=<?php print $page - 1;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
          <?php } ?>
          <?php for($i = 1; $i <= $count_page; $i++){?>
            <li class="page-item"><a class="page-link" href="index.php?sort=<?php print $sort;?>&page=<?php print $i;?>"><?php print $i;?></a></li>
          <?php } ?>
          <?php if($count_page > $page){?>
          <li class="page-item">
            <a class="page-link" href="index.php?sort=<?php print $sort;?>&page=<?php print $page + 1;?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          <?php } ?>
        </ul>
    </nav>
    <?php } ?>
  </div>
  
</body>
</html>