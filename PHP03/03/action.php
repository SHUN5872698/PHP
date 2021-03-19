<?php
$number_A = $_POST['number_A'];
$number_B = $_POST['number_B'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題03-03</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-4"></div>
      <div class="col-4">
        <div class="card">
          <div class="card-header">結果発表</div>
          <div class="card-body">
            <?php
            if ($number_A >= 80 && $number_B >= 80) {
              echo "素晴らしいです!";
            } else if ($number_A >= 80 || $number_B >= 80) {
              echo "良しとしましょう!";
            } else {
              echo "まあ、いいでしょう・・・";
            }
            ?>
          </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
  </div>
</body>

</html>
