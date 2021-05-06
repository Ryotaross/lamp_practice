<?php

function insert_detail($db,$item_id,$item_name,$item_price,$quentity,$history_id){
    $bind = array($history_id,$item_id,$item_name,$item_price,$quentity);
    $sql = "INSERT INTO details(order_id,item_id,item_name,item_price,quentity) VALUES(?,?,?,?,?)";
    return execute_query($db, $sql, $bind);
}
function get_user_detail($db,$order_id){
    $sql = "SELECT items.name,detail.price,detail.quantity,detail.price * detail.quantity
            FROM details INNER JOIN items ON detail.item_id = items.item_id
            WHERE detail.order_id = '{$order_id}' ";
    return fetch_query($db, $sql);
}
