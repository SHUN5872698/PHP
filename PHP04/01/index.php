<?php
$fruits = ['みかん', 'りんご', 'メロン', 'バナナ', 'パイナップル'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題04-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-5">
        <div class="card">
          <div class="card-header">果物のリスト</div>
          <div class="card-body">
            <ul>
              <?php
              for ($i = 0; $i <= 4; $i++) { ?>
                <li> <?= $fruits[$i] ?> </li>
              <?php }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
