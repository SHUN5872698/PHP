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
  public function __construct($category, $menu, $noodleHardness, $price)
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
      'カテゴリー' => $this->category,
      'メニュー' => $this->menu,
      '固さ' => $this->noodleHardness,
      '値段' => $this->price,
    ];
    return $datas;
  }
}
