<?php
// アップロードされたファイルをimagesフォルダに保存する
$path = './images/' . $_FILES['image_file']['name'];
// 同じファイル名があるときはファイルを上書きする
move_uploaded_file($_FILES['image_file']['tmp_name'], $path . $_FILES['image_file']['name']);

// 完了後index.phpにリダイレクトして終了する
header('Location: ./');
exit;
