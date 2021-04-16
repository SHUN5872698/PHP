<?php
// Carbonを使用するためautoload.phpの読み込む
require_once('/Applications/MAMP/vendor/autoload.php');
// データベース接続のためのファイルを読み込む
require_once('./class/db/Base.php');
require_once('./class/db/TodoItems.php');
//ライブラリを使用
use Carbon\Carbon;

try {
  // 今日の日付のCarbonクラスのインスタンスを生成。
  $now = Carbon::now('Asia/Tokyo');
  // 現在時刻をフォーマット
  $now = $now->format('Y-m-d');

  // todo_itemテーブルクラスのインスタンスを生成する
  $db = new TodoItems();
  // レコードを全件取得する（期限日の古いものから並び替える）
  $lists = $db->selectAll();
} catch (Exception $e) {
  // 例外が発生した場合$eに代入されたインスタンスのメソッドを出力して終了
  var_dump($e);
  // echo $e->getMessage();
  exit;
}


?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題13-06</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    #expiration_date {
      width: 12rem;
    }

    #todo_item {
      width: 25rem;
    }

    .complete {
      text-decoration: line-through;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">TODOリスト</div>
          <div class="card-body">
            <form action="./add.php" method="post" class="form-inline">
              <div class="form-group mb-3 mr-1">
                <label for="expiration_date" class="sr-only">期限日</label>
                <input type="date" name="expiration_date" value="<?= $now ?>" id="expiration_date" class="form-control">
              </div>
              <div class="form-group mb-3 mr-1">
                <label for="todo_item" class="sr-only">TODO項目</label>
                <input type="text" name="todo_item" placeholder="TODO項目を入力してください" id="todo_item" class="form-control">
              </div>
              <input type="submit" value="追加" class="btn btn-primary mb-3">
            </form>
            <?php if (count($lists) > 0) { ?>
              <table class="table table-borderd">
                <tr>
                  <th>期限日</th>
                  <th>TODO項目</th>
                  <th></th>
                </tr>
                <?php foreach ($lists as $list) { ?>
                  <tr>
                    <td class="<?php if ($list['is_completed'] == 1) echo 'complete' ?>"><?= $list['expiration_date'] ?></td>
                    <td class="<?php if ($list['is_completed'] == 1) echo 'complete' ?>"><?= $list['todo_item'] ?></td>
                    <td>
                      <form action="./action.php" method="POST" class="form-inline">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>">
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="radio" value="0" name="is_completed" id="is_complete1" class="form-check-input" <?php if ($list['is_completed'] == 0) echo ' checked' ?>>
                          <label for="complete1" class="form-check-label">未完了</label>
                        </div>
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="radio" value="1" name="is_completed" id="is_complete2" class="form-check-input" <?php if ($list['is_completed'] == 1) echo ' checked' ?>>
                          <label for="complete2" class="form-check-label">完了</label>
                        </div>
                        <div class="form-check form-check-inline mb-3 mr-1">
                          <input type="checkbox" value="1" name="delete" id="delete" class="form-check-input">
                          <label for="delete" class="form-check-label">削除</label>
                        </div>
                        <input type="submit" value="実行" class="btn btn-primary mb-3">
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            <?php } ?>
            <a href="./csv.php" class="btn btn-outline-primary">CSVファイルに変換</a>
            <a href="./download.php" class="btn btn-outline-primary">CSVファイルをダウンロード</a>
            <a href="./upload.php" class="btn btn-outline-primary">CSVファイルをアップロードして更新</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
