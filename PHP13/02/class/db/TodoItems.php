<?php
class TodoItems extends Base
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
   * レコードを全件抽出 （期限日の古いものから並び替える）
   *
   * @return void
   */
  public function selectAll()
  {
    // レコードを全件取得するSQL文（期限日の古いものから並び替える）
    $sql = 'select * from todo_items order by expiration_date';

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQLを実行する
    $stmt->execute();

    // 取得したレコードを連想配列として返却する
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * レコード内容を更新
   *
   * @param integer $id
   * @param String $expiration_date 期限日
   * @param String $todoItem タスク内容
   * @param integer $isCompleted 完了、未完了
   * @return void
   */
  public function update(int $id, String $expiration_date, String $todoItem, int $isCompleted)
  {

    // レコードをアップデートするSQL文
    $sql = "UPDATE todo_items set expiration_date=:expiration_date, todo_item=:todo_item, is_completed=:is_completed where id=:id";

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':expiration_date', $expiration_date, PDO::PARAM_STR);
    $stmt->bindValue(':todo_item', $todoItem, PDO::PARAM_STR);
    $stmt->bindValue(':is_completed', $isCompleted, PDO::PARAM_INT);

    // SQLを実行する
    $stmt->execute();
  }

  /**
   * 指定IDのレコードの完了、未完了を切り替える
   *
   * @param integer $id
   * @param integer $isCompleted 期限日
   * @return void
   */
  public function updateIsCompletedByID(int $id, int $isCompleted)
  {

    // レコードをアップデートするSQL文
    $sql = "UPDATE todo_items set is_completed=:is_completed where id=:id";

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':is_completed', (int) $isCompleted, PDO::PARAM_INT);

    // SQLを実行する
    $stmt->execute();
  }

  /**
   * 指定IDのレコードを削除する
   *
   * @param integer $id
   * @return void
   */
  public function delete(int $id)
  {
    // レコードを削除するSQL文
    $sql = "DELETE FROM todo_items WHERE id=:id";

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // SQLを実行する
    $stmt->execute();
  }

  /**
   * 新規レコードをインサートする
   *
   * @param string $expirationDate 期限日
   * @param string $todoItem タスク内容
   * @param integer $isCompleted 完了、未完了
   * @return void
   */
  public function insert(string $expirationDate, string $todoItem, int $isCompleted = 0)
  {

    // 新規レコードをインサートするSQL文
    $sql = "INSERT INTO todo_items(expiration_date, todo_item, is_completed)
    VALUES (:expiration_date, :todo_item, :is_completed)";

    // SQL文を実行する準備
    $stmt = $this->dbh->prepare($sql);

    // SQL文の該当箇所に、変数の値を割り当て（バインド）
    $stmt->bindValue(':expiration_date', $expirationDate, PDO::PARAM_STR);
    $stmt->bindValue(':todo_item', $todoItem, PDO::PARAM_STR);
    $stmt->bindValue(':is_completed', $isCompleted, PDO::PARAM_INT);

    // SQLを実行する
    $stmt->execute();
  }
}
