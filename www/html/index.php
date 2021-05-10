<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

header("X-FRAME-OPTIONS: DENY");
$page = 1;

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$token = get_csrf_token();
$sort = get_get('sort');
$count_page = get_item_count($db);
$page = get_get('page');

$items = get_open_items($db,$sort,$page);

include_once VIEW_PATH . 'index_view.php';