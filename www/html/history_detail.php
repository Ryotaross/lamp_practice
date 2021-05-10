<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'history.php';
require_once MODEL_PATH . 'detail.php';

header("X-FRAME-OPTIONS: DENY");

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_post('order_id');

if(is_admin($user) === true){
    $details = get_user_detail($db,$order_id);
    $history = get_admin_detail_history($db,$order_id);
}else {
    $details = get_user_detail($db,$order_id);
    $history = get_detail_history($db,$user['user_id'],$order_id);
}





include_once VIEW_PATH . '/history_detail.php';
