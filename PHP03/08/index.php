<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題03-8</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    th,
    td {
      text-align: right;
    }
  </style>
</head>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <table class="table table-bordered my-3">
          <?php
          for ($row = 0; $row < 10; $row++) {
          ?>
            <tr>
              <?php
              for ($col = 0; $col < 10; $col++) {
                if ($col == 0 && $row == 0) {
              ?>
                  <th class="table-primary"></th>
                <?php
                } elseif ($row == 0) {
                ?>
                  <th class="table-primary"><?= $col ?></th>
                <?php
                } elseif ($col == 0) {
                ?>
                  <th class="table-primary"><?= $row ?></th>
                  <?php } else {
                  $ret = $col * $row;
                  if ($ret % 2 == 0) {
                  ?>
                    <td class="table-active"><?= $ret ?></td>
                  <?php
                  } else {
                  ?>
                    <td><?= $ret ?></td>
              <?php
                  }
                }
              } ?>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</body>

</html>
