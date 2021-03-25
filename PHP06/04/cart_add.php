<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();



//$_POSTで商品情報が送られてきた場合
if (isset($_POST)) {
  //商品情報をを変数に代入
  $name = $_POST['product_name'];
  $price = $_POST['price'];
  $count = $_POST['count'];
};

//$_POSTで送られてきた商品名がセッションに存在するか判定
$key = isset($_SESSION['cart'][$name]);

//セッションになかった場合
if ($key == false) {
  //新たにセッション情報を作成
  $_SESSION['cart'][$name] = $_POST;

  //セッションにあった場合
} else {
  //セッション情報を変数に代入
  $products = $_SESSION['cart'];
  //$productsをforeachで回し、キー(商品名)と値（金額・個数）取得
  foreach ($products as $key => $product) {
    //セッションの商品名と$nameが一致していた場合
    if ($key == $name) {
      ///カート内の商品数とを合算する
      $count = (int)$count + (int)$product['count'];
    }
  }
  $_SESSION['cart'][$name] = [
    'product_name' => $name,
    'price' => $price,
    'count' => $count,
  ];
}
//商品リストページへ戻る
header('location:./');
exit;
