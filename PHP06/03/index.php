<?php
$products = array(
  0 => [
    "product_name" => "みかん",
    "price" => "300"
  ],
  1 => [
    "product_name" => "りんご",
    "price" => "500"
  ],
  2 => [
    "product_name" => "バナナ",
    "price" => "150"
  ],
);
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
          <div class="card-header">商品リスト</div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>注文数</th>
                <th></th>
              </tr>
              <?php foreach ($products as $product) { ?>
                <tr>
                  <form action="./show.php" method="post">
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
                    <input type="hidden" name="price" value="<?= $product['price'] ?>">
                    <td><input type="number" name="count" class="form-control" style="width: 5rem; text-align: left;"></td>
                    <td><input type="submit" value="カートに入れる" class="btn btn-primary"></td>
                  </form>
                </tr>
              <?php } ?>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
