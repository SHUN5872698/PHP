<?php
//親クラスを継承してクラスを定義する
class Noodle extends Menu
{

  //クラスのプロパティ（クラス変数）の作成
  protected $noodleHardness;

  /**
   * //コンストラクトの呼び出し *
   * @param string $category メニューのカテゴリー
   * @param string $menu メニュー
   * @param integer $price 値段
   * @param string $noodleHardness 麺の硬さ
   */
  public function __construct($category, $menu, $price, $noodleHardness)
  {
    //親クラスのコンストラクタの呼び出し
    parent::__construct($category, $menu, $price);
    // コンストラクタの引数をプロパティに代入
    $this->noodleHardness = $noodleHardness;
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
      'noodleHardness' => $this->noodleHardness,
    ];
    return $datas;
  }
}
