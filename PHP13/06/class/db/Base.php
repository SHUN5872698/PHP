<?php

class Base
{
  //接続データベース名
  const DB_NAME = 'php_work2';

  //データベースホスト名
  const DB_HOST = 'localhost';

  //データベース接続ユーザー名
  const DB_USER = 'root';

  //データベースの接続パスワード
  const DB_PASS = 'root';

  //PDOクラスのインスタンス
  protected $dbh;

  /**
   * コンストラクトの呼び出し
   */
  public function __construct()
  {
    // データベースに接続するための文字列（DSN 接続文字列）
    $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST . ';charset=utf8';

    // PDOクラスのインスタンス
    $this->dbh = new PDO($dsn, self::DB_USER, self::DB_PASS);

    // エラーが起きたときのモードを指定する
    // 「PDO::ERRMODE_EXCEPTION」を指定すると、エラー発生時に例外がスローされる
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}
