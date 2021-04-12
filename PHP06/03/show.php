<?php
$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$total = $price * $count;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題06-03</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header">カート内アイテム</div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>注文数</th>
                <th>合計金額</th>
              </tr>
              <tr>
                <form action="./show.php" method="post">
                  <td><?= $name ?></td>
                  <td><?= $price ?>円</td>
                  <td><?= $count ?>個</td>
                  <td><?= $total ?>円</td>
                </form>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
