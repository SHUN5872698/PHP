<?php
//クラスを定義する
class Menu
{
  // クラスのプロパティ（クラス変数）の作成
  private $category;
  private $menu;
  private $price;

  //コンストラクトの呼び出し
  public function __construct($category, $menu, $price)
  {
    $this->category = $category;
    $this->menu = $menu;
    $this->price = $price;
  }

  //変数を連想配列に格納してreturnする
  public function getData()
  {
    $datas = [
      'category' => $this->category,
      'menu' => $this->menu,
      'price' => $this->price,
    ];
    return $datas;
  }
}

//POSTされた内容からクラスのインスタンスを作成
$datas = new Menu($_POST['category'], $_POST['menu'], $_POST['price']);
$datas = $datas->getData();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-01</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-8">
        <div class="card">
          <div class="card-header">オーダー確認</div>
          <div class="card-body">
            <table class="table table-bordered">
              <?php foreach ($datas as $key => $data) { ?>
                <tr>
                  <td><?= $key ?></td>
                  <td><?= $data ?></td>
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
