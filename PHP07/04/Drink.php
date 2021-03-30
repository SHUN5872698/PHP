<?php
//クラスを定義する
class Drink
{
  //クラスのプロパティ（クラス変数）の作成
  protected $category;
  protected $menu;
  protected $size;
  protected $price;
  /**
   * //コンストラクトの呼び出し *
   * @param string $category メニューのカテゴリー
   * @param string $menu メニュー
   * @param integer $price 値段
   * @param integer $price ジョッキの大きさ
   */
  public function __construct($category, $menu, $size, $price)
  {
    // コンストラクタの引数をプロパティに代入
    $this->category = $category;
    $this->menu = $menu;
    $this->size = $size;
    $this->price = $price;
  }

  /**
   * クラス変数の内容を連想配列で返却 *
   * @return array 連想配列
   */
  public function getData()
  {
    $datas = [
      'カテゴリー' => $this->category,
      'メニュー' => $this->menu,
      'ジョッキの大きさ' => $this->size,
      '値段' => $this->price,
    ];
    return $datas;
  }
}
