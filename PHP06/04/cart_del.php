<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

if (isset($_POST['product_name'])) {
  $name = $_POST['product_name'];
}
if (isset($_GET['all_items'])) {
  $all_items = $_GET['all_items'];
}
// var_dump($all_items);
// exit;

//セッションに商品情報が存在していてかつPOSTで商品名がPOST送信されていた場合
if (isset($_SESSION['cart']) && isset($name)) {

  //該当の商品のセッションを破棄して削除してカートページに戻る
  unset($_SESSION['cart'][$_POST['product_name']]);
  header('location:cart_show.php');
  exit;
  //セッションに商品情報が存在していてかつall_itemsが送信されていた場合
} elseif (isset($_SESSION['cart']) && isset($all_items)) {
  //セッション情報を全て破棄して商品リストページに戻る
  unset($_SESSION['cart']);
  header('location:./');
  exit;
}
