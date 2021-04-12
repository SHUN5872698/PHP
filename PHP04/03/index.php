<?php
$menus = [
  'Aランチ', 'Bランチ', 'Cランチ',
  '唐揚げ定食', 'とんかつ定食', 'エビフライ定食',
  'オムライス', 'カレーライス', 'ごはん大',
  'ごはん小', 'ビール', '烏龍茶',
];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題04-03</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-5">
        <div class="card">
          <div class="card-header">メニュー</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($menus as $key => $menu) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $menu ?></td>
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
