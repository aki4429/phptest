<?php
// PHPMailer を読み込む（composerなし、直接読み込み形式）
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ライブラリ読み込み（ファイルと同じ階層に PHPMailer を置いてください）
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// フォームから送られたデータを取得
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$to_admin = 'admin@example.com'; // 管理者のメールアドレス

// バリデーション
if (empty($name) || empty($email) || empty($message)) {
    echo "すべての項目を入力してください。";
    exit;
}

// ユーザーへの確認メール
$userMail = new PHPMailer(true);
try {
    $userMail->isSMTP();
    $userMail->Host       = 'smtp.xserver.jp'; // XサーバーのSMTP
    $userMail->SMTPAuth   = true;
    $userMail->Username   = 'your_account@example.com'; // あなたのXサーバーメール
    $userMail->Password   = 'your_password';
    $userMail->SMTPSecure = 'tls';
    $userMail->Port       = 587;
    $userMail->CharSet    = 'UTF-8';

    $userMail->setFrom('your_account@example.com', 'おだちんWEB');
    $userMail->addAddress($email, $name);
    $userMail->Subject = '【おだちんWEB】お問い合わせありがとうございます';
    $userMail->Body    = <<<EOT
{$name}様

お問い合わせありがとうございます。
以下の内容で受け付けました。

名前: {$name}
メール: {$email}
メッセージ: 
{$message}

＝＝＝＝＝＝＝＝＝＝
おだちんWEB
EOT;

    $userMail->send();
} catch (Exception $e) {
    echo "ユーザー宛メールの送信に失敗しました: {$userMail->ErrorInfo}";
    exit;
}

// 管理者への通知メール
$adminMail = new PHPMailer(true);
try {
    $adminMail->isSMTP();
    $adminMail->Host       = 'smtp.xserver.jp';
    $adminMail->SMTPAuth   = true;
    $adminMail->Username   = 'your_account@example.com';
    $adminMail->Password   = 'your_password';
    $adminMail->SMTPSecure = 'tls';
    $adminMail->Port       = 587;
    $adminMail->CharSet    = 'UTF-8';

    $adminMail->setFrom('your_account@example.com', 'WEBサイト');
    $adminMail->addAddress($to_admin);
    $adminMail->Subject = '【WEBサイト】新しいお問い合わせがあります';
    $adminMail->Body    = <<<EOT
新しいお問い合わせがありました。

名前: {$name}
メール: {$email}
メッセージ: 
{$message}
EOT;

    $adminMail->send();
    echo "送信が完了しました。";
} catch (Exception $e) {
    echo "管理者宛メールの送信に失敗しました: {$adminMail->ErrorInfo}";
}
?>