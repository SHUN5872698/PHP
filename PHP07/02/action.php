<?php
//クラスを定義する
class Menu
{
  // クラスのプロパティ（クラス変数）の作成
  private $category;
  private $menu;
  private $price;

  /**
   * //コンストラクトの呼び出し *
   * @param string $category メニューのカテゴリー
   * @param string $menu メニュー
   * @param integer $price 値段
   */
  public function __construct($category, $menu, $price)
  {
    $this->category = $category;
    $this->menu = $menu;
    $this->price = $price;
  }

  /**
   * クラス変数の内容を連想配列で返却 *
   * @return array 連想配列
   */
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

//POSTされた内容から連想配列を作成
$datas = new Menu($_POST['category'], $_POST['menu'], $_POST['price']);
$datas = $datas->getData();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題07-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
