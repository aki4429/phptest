<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["username"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);

    $errors = [];

    // 名前チェック
    if (empty($name)) {
        $errors[] = "⚠️ 名前を入力してください。";
    }

    // 電話番号チェック（数字と-のみ許可）
    if (!preg_match("/^[0-9\-]+$/", $phone)) {
        $errors[] = "⚠️ 電話番号は数字とハイフンで入力してください。";
    }

    // メールアドレスチェック
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "⚠️ メールアドレスの形式が正しくありません。";
    }

    // エラーがあれば表示
    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo $e . "<br>";
        }
        echo "<br><a href='form.html'>戻る</a>";
    } else {
        echo "✅ 入力ありがとうございます！<br>";
        echo "名前: " . htmlspecialchars($name) . "<br>";
        echo "電話番号: " . htmlspecialchars($phone) . "<br>";
        echo "メール: " . htmlspecialchars($email) . "<br>";
    }
} else {
    echo "フォームからアクセスしてください。";
}
?>