<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // サーバー設定
    $mail->isSMTP();
    $mail->Host = 'sv14443.xserver.jp'; // ← XサーバーのSMTPホストに変更
    $mail->SMTPAuth = true;
    $mail->Username = 'custa@odachin.net'; // ← Xサーバーのメールアドレス
    $mail->Password = 'Odachin4429'; // ← そのメールのパスワード
    $mail->SMTPSecure = 'ssl'; // または 'tls'
    $mail->Port = 465; // SSLなら465, TLSなら587

    // 💡 ここが重要：日本語の文字化け対策
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    // 送信者・受信者
    $mail->setFrom('info@odachin.net', 'おだちんWEB');
    $mail->addAddress($_POST['email'], $_POST['username']);

    // メール内容
    $mail->Subject = 'お問い合わせありがとうございます';
    $mail->Body    = "以下の内容を受け付けました：\n\n" .
                     "お名前：{$_POST['username']}\n" .
                     "電話番号：{$_POST['phone']}\n" .
                     "メール：{$_POST['email']}\n" .
                     "メッセージ：{$_POST['message']}";

    $mail->send();

// ------- 管理者宛メール（新しいPHPMailerインスタンスを作る） --------
    $adminMail = new PHPMailer(true);
    $adminMail->isSMTP();
    $adminMail->Host       = 'sv14443.xserver.jp';
    $adminMail->SMTPAuth   = true;
    $adminMail->Username   = 'info@odachin.net';
    $adminMail->Password   = 'Odachin4429';
    $adminMail->SMTPSecure = 'ssl';
    $adminMail->Port       = 465;

    $adminMail->CharSet = 'UTF-8';
    $adminMail->Encoding = 'base64';

    $adminMail->setFrom('info@odachin.net', 'おだちんWEB通知');
    $adminMail->addAddress('akiyoshi.oda@gmail.com', 'おだちんさん');  // 管理者宛

    $adminMail->Subject = '【通知】フォーム送信がありました';
    $adminMail->Body    = "フォームから以下の送信がありました：\n\n" .
                          "お名前：{$_POST['username']}\n" .
                          "電話番号：{$_POST['phone']}\n" .
                          "メール：{$_POST['email']}\n" .
                          "メッセージ：{$_POST['message']}";

    $adminMail->send();



    echo '✅ メールが送信されました！';
} catch (Exception $e) {
    echo "❌ 送信エラー: {$mail->ErrorInfo}";
}
?>