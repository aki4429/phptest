<?php
// フォーム送信処理（POSTのとき）
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $message = $_POST["message"] ?? "";

    $errors = [];

    // バリデーション
    if (trim($name) === "") $errors[] = "名前を入力してください。";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "メールアドレスの形式が正しくありません。";
    if (trim($message) === "") $errors[] = "メッセージを入力してください。";

    if (empty($errors)) {
        // メール送信
        $to = "info@odachin.net"; // 管理者メールアドレスに変更
        $subject = "お問い合わせが届きました";
        $body = <<<EOT
以下の内容でお問い合わせを受け付けました：

名前: $name
メール: $email
メッセージ:
$message
EOT;

        $headers = "From: $email";

        if (mb_send_mail($to, $subject, $body, $headers)) {
            $success = "送信が完了しました。ありがとうございます！";
        } else {
            $errors[] = "送信に失敗しました。";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム</title>
</head>

<body>
  <h1>お問い合わせフォーム</h1>

  <?php if (!empty($errors)): ?>
  <ul style="color:red;">
    <?php foreach ($errors as $err): ?>
    <li><?= htmlspecialchars($err) ?></li>
    <?php endforeach; ?>
  </ul>
  <?php elseif (!empty($success)): ?>
  <p style="color:green;"><?= htmlspecialchars($success) ?></p>
  <?php endif; ?>

  <form method="post" action="">
    名前: <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"><br><br>
    メールアドレス: <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br><br>
    メッセージ: <br>
    <textarea name="message" rows="5" cols="40"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea><br><br>
    <input type="submit" value="送信">
  </form>
</body>

</html>