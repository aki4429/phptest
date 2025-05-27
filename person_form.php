<?php
// 入力された名前がある場合のみ表示処理
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]); // セキュリティのためにエスケープ
    $tel = htmlspecialchars($_POST["tel"]); // セキュリティのためにエスケープ
    $mail = htmlspecialchars($_POST["mail"]); // セキュリティのためにエスケープ
    print($name . "," . $tel . "," . $mail);
     // 保存するCSVファイル名
    $filename = "data.csv";

    // ファイルを追記モードで開く（あれば追加、なければ新規作成）
    $file = fopen($filename, "a");

    // データを配列にまとめる（カンマ区切り）
    $data = [$name, $tel, $mail, date("Y-m-d H:i:s")]; // タイムスタンプ付き

    // 配列をCSV形式で1行として書き込む
    // fputcsv($file, $data);
    fputcsv($file, $data, ",", '"', "\\");

    // ファイルを閉じる
    fclose($file);

    // ユーザーにメッセージを表示
    echo "<p>データを保存しました。ありがとうございました！</p>";
}
?>

<!-- 入力フォーム -->
<form method="POST" action="">
  <label for="name">お名前を入力してください：</label><br>
  <input type="text" name="name" id="name" required><br>
  <label for="tel">電話番号を入力してください：</label><br>
  <input type="text" name="tel" id="tel" required><br>
  <label for="tel">メールアドレスを入力してください：</label><br>
  <input type="text" name="mail" id="mail" required><br>
  <button type="submit">送信</button>
</form>