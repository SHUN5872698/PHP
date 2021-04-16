<?php
class Users extends Base
{

  /**
   * コンストラクトの呼び出し
   */
  public function __construct()
  {
    // 親クラスのコンストラクタの呼び出し
    parent::__construct();
  }

  /**
   * 新規ユーザー追加
   *
   * @param string $email メールアドレス
   * @param string $password パスワード
   * @param string $name ユーザー名
   * @return boolean
   */
  public function addUser(string $email, string $password, string $name): bool
  {
    //重複チェックの実行
    if (!empty($this->findUserByEmail($email))) {
      //同一のメールアドレスのユーザーがいたらfalseを返す
      return false;
    }
    // パスワードのハッシュ化
    $password = password_hash($password, PASSWORD_DEFAULT);

    // 新規レコードをインサートするSQL文
    $sql = 'INSERT INTO users (email, password, name)
    VALUES (:email, :password, :name)';

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);

    // SQL文を実行
    $stmt->execute();

    // 処理が終了したらtrueを返却
    return true;
  }

  /**
   * メールアドレスの重複チェック
   *
   * @param string $email
   * @return array
   */
  private function findUserByEmail(string $email): array
  {
    // メールアドレスの重複チェックのSQL文
    $sql = 'SELECT * from users where email=:email';

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    // SQL文を実行
    $stmt->execute();
    // 実行結果を取得
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    // $recの中身が空かどうかの判定
    if (empty($rec)) {
      return [];
    }
    return $rec;
  }
  /**
   * メールアドレスとパスワードが一致するユーザーを取得する
   *
   * @param string $email メールアドレス
   * @param string $password パスワード
   * @return array
   */
  public function getUser(string $email, string $password): array
  {

    // メールアドレスの重複チェックの実行
    $rec = $this->findUserByEmail($email);

    // 存在しなかった場合、空の配列を返す
    if (empty($rec)) {
      return [];
    }

    // パスワードの照合
    if (password_verify($password, $rec['password'])) {
      // 存在した場合連想配列に保存
      return $rec;
    }

    // 存在しなかった場合、空の配列を返す
    return [];
  }
}
