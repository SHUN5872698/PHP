<?php
// セッションをスタートする。
session_start();
// セッションIDをリクエストのたびに更新する。
session_regenerate_id();
// セッションに保存されているエラーメッセージを削除する
if (isset($_SESSION['error'])) {
  unset($_SESSION['error']);
}

try {
  // 作成したメソッドを利用して日付が正しいかどうか確認する
  if (!isDate($_POST['date'])) {
    // 日付が正しくないときは(falseが返ってきた場合)、例外をスローする
    throw new Exception('日付の形式が正しくありません');
  }
} catch (Exception $e) {

  //例外発生時$eに代入されたインスタンスのメソッドへアクセス
  //エラーメッセージと送信された値をセッションに保存
  $_SESSION['error']['msg'] = $e->getMessage();
  $_SESSION['error']['date'] = $_POST['date'];
  //index.phpにリダイレクトして終了
  header('Location: ./');
  exit;
}

/**
 * 正しい日付かどうかを確認
 *
 * @param string $str=仮引数＝区切りの日付の文字列
 * @return boolean
 * 正しい日付型だった場合はtrueそうでない場合はfalseを返す
 */
function isDate($str)
{
  //explode関数を使って日付判定
  $d = explode('/', $str);
  //分割された文字列を返す
  return checkdate($d[1], $d[2], $d[0]);
}
?>
<!-- 正しい日付型だった場合のページ -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習問題09-02</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row justify-content-md-center mt-3">
      <div class="col-4">
        <div class="card">
          <div class="card-header">判定結果</div>
          <div class="card-body">
            <p>正しい日付です。</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
