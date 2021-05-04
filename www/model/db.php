<?php

function get_db_connect(){
  // MySQL用のDSN文字列
  $dsn = 'mysql:dbname='. DB_NAME .';host='. DB_HOST .';charset='.DB_CHARSET;
 
  try {
    // データベースに接続
    $dbh = new PDO($dsn, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    exit('接続できませんでした。理由：'.$e->getMessage() );
  }
  return $dbh;
}

function fetch_query($db, $sql, $bind,$params = array()){
  try{
    $statement = $db->prepare($sql);
    bindV($bind,$statement);
    $statement->execute();
    return $statement->fetch();
  }catch(PDOException $e){
    set_error('データ取得に失敗しました。' . $e);
  }
  return false;
}

function fetch_all_query($db, $sql, $params = array()){
  try{
    $statement = $db->prepare($sql);
    $statement->execute($params);
    return xss($statement->fetchAll());
  }catch(PDOException $e){
    set_error('データ取得に失敗しました。');
  }
  return false;
}

function execute_query($db, $sql, $bind ,$params = array()){
  try{
    $statement = $db->prepare($sql);
    bindV($bind,$statement);
    return $statement->execute();
  }catch(PDOException $e){
    set_error('更新に失敗しました。');
  }
  return false;
}
function bindV($bind,$statement){
  if(is_array($bind)){
    for($i = 0; $i < count($bind); $i++){
       $statement->bindValue($i + 1,$bind[$i],PDO::PARAM_STR);
    }
  }else {
      $statement->bindValue(1,$bind,PDO::PARAM_STR);
  }
  
}