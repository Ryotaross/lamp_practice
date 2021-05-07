<?php

function insert_history($db,$user_id){
    $sql = "INSERT INTO history(customer_id) VALUE('{$user_id}')";
    return execute_query($db, $sql);
}
function get_user_history($db,$user_id){
    $sql = "SELECT history.order_id,history.order_date,sum(details.item_price * details.quentity)
            FROM history INNER JOIN details ON history.order_id = details.order_id
            WHERE history.customer_id = '{$user_id}' group by history.order_id 
            ORDER BY history.order_date DESC ";
    return fetch_all_query($db, $sql);
}
function get_admin_history($db){
    $sql = "SELECT history.order_id,history.order_date,sum(details.item_price * details.quentity)
            FROM history INNER JOIN details ON history.order_id = details.order_id
            group by history.order_id ORDER BY history.order_date DESC ";
    return fetch_all_query($db, $sql);
}
function get_order_id($db,$user_id){
    $sql = "SELECT order_id
            FROM history WHERE customer_id = '{$user_id}' ORDER BY order_date DESC LIMIT 1 ";
    return fetch_query($db, $sql);
}
function get_detail_history($db,$user_id,$order_id){
    $sql = "SELECT history.order_id,history.order_date,sum(details.item_price * details.quentity)
            FROM history INNER JOIN details ON history.order_id = details.order_id
            WHERE history.customer_id = '{$user_id}' AND history.order_id = '{$order_id}'
            group by history.order_id ";
    return fetch_query($db, $sql);
}
function get_admin_detail_history($db,$order_id){
    $sql = "SELECT history.order_id,history.order_date,sum(details.item_price * details.quentity)
            FROM history INNER JOIN details ON history.order_id = details.order_id
            WHERE history.order_id = '{$order_id}' group by history.order_id ";
    return fetch_query($db, $sql);
}