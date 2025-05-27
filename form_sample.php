<?php
// 入力された名前がある場合のみ表示処理
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]); // セキュリティのためにエスケープ
    echo "<h2>こんにちは、" . $name . "さん！</h2>";
}
?>

<!-- 入力フォーム -->
<form method="POST" action="">
  <label for="name">お名前を入力してください：</label><br>
  <input type="text" name="name" id="name" required>
  <button type="submit">送信</button>
</form>