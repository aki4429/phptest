<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["username"] ?? "";
    $tel = $_POST["phone"] ?? "";
    $email = $_POST["email"] ?? "";

    // 入力チェック（簡易バリデーション）
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "メールアドレスの形式が正しくありません。";
        exit;
    }

    // CSVファイルに追記モードで開く
    $file = fopen("data.csv", "a");

    if ($file) {
        fputcsv($file, [$name, $tel, $email]);
        fclose($file);
        echo "CSVファイルに保存しました。";
    } else {
        echo "ファイルの書き込みに失敗しました。";
    }
}
?>