<?php
$num = $_POST['num'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題03-06</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-3"></div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">繰り返し処理</div>
          <div class="card-body">
            <p><?php echo $num ?>回繰り返します。
              <br>
              <font color="red">※ただし、奇数回は表示しません</font>
            </p>
            <ul>
              <?php
              for ($i = 1; $i <= $num; $i++) {
                if ($i % 2 == 1) {
                  continue;
                }
                echo '<li>' . $i . '回目</li>';
              }
              ?>
            </ul>
          </div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
  </div>
</body>

</html>
