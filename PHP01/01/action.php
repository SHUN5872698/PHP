<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題01-1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-4"></div>
      <div class="col-4">
        <div class="card">
          <div class="card-header">送信された内容</div>
          <div class="card-body">
            <p>id:<?= $_GET['id'] ?></p>
            <p>name:<?= $_GET['name'] ?></p>
          </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
  </div>

</body>

</html>
