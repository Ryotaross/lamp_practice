<?php

function insert_detail($db,$item_id,$item_name,$item_price,$quentity,$history_id){
    $bind = array($history_id,$item_id,$item_name,$item_price,$quentity);
    $sql = "INSERT INTO details(order_id,item_id,item_name,item_price,quentity) VALUES(?,?,?,?,?)";
    return execute_query($db, $sql, $bind);
}
function get_user_detail($db,$order_id){
    $sql = "SELECT item_name,item_price,quentity,item_price * quentity
            FROM details WHERE order_id = '{$order_id}' ";
    return fetch_all_query($db, $sql);
}
