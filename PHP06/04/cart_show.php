<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();

//商品ごとの合計金額の変数を作成
$sum = 0;
//カート内アイテムの合計金額の変数作成
$total = 0;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練習問題06-04</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">カート内アイテム</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                                <thead>
                                    <tr align="center">
                                        <th>商品名</th>
                                        <th>単品価格</th>
                                        <th>注文数</th>
                                        <th>小計</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                        <form method="post" action="./cart_del.php">
                                            <tr align="center">
                                                <td><?= $value['product_name'] ?></td>
                                                <td><?= $value['price'] ?>円</td>
                                                <td><?= $value['count'] ?>個</td>
                                                <?php $sum = $value['price'] * $value['count']; ?>
                                                <?php $total += $sum ?>
                                                <td><?= $sum ?>円</td>
                                                <td>
                                                    <input type="hidden" name="product_name" value="<?= $key ?>">
                                                    <input type="submit" value="削除" class="btn btn-danger">
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                        </table>
                        <p>合計金額：<?= $total ?>円</p>
                        <div class="delete mb-2">
                            <input type="button" class="btn btn-outline-danger" onclick="location.href='cart_del.php?all_items'" value="カートを空にする">
                        </div>
                        <div class="back">
                            <input type="button" class="btn btn-outline-primary" onclick="location.href='index.php'" value="戻る">
                        </div>

                    <?php } else { ?>
                        <p>カート内にアイテムがありません</p>
                        <div class="back">
                            <input type="button" class="btn btn-outline-primary" onclick="location.href='index.php'" value="戻る">
                        </div>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>
</body>

</html>
