<?php
//クラスを定義する
class Menu
{
  //クラスのプロパティ（クラス変数）の作成
  protected $category;
  protected $menu;
  protected $price;

  /**
   * //コンストラクトの呼び出し *
   * @param string $category メニューのカテゴリー
   * @param string $menu メニュー
   * @param integer $price 値段
   */
  public function __construct($category, $menu, $price)
  {
    // コンストラクタの引数をプロパティに代入
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
