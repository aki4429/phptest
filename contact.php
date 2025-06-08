<?php
// PHPMailer を読み込む（composer読み込み形式）
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ライブラリ読み込み（composerではautoloadで必要ファイル自動読み込み）
require 'vendor/autoload.php';

//dotenv読み込み
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 変数を使う
$mailHost = $_ENV['MAIL_HOST'];
$mailPort = $_ENV['MAIL_PORT'];
$mailUser = $_ENV['MAIL_USERNAME'];
$mailPass = $_ENV['MAIL_PASSWORD'];
$mailSecure = $_ENV['MAIL_ENCRYPTION'];
$mailFaddress = $_ENV['MAIL_FROM_ADDRESS'];
$mailFname = $_ENV['MAIL_FROM_NAME'];
$to_admin = 'akiyoshi.oda@gmail.com'; // 管理者のメールアドレス


// フォームから送られたデータを取得
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// 入力値の取得とトリム
$name = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

// エラーメッセージ初期化
$errors = [];

// バリデーションチェック
if ($name === '') {
    $errors[] = '名前を入力してください。';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = '正しいメールアドレスを入力してください。';
}
if ($phone === '' || !preg_match('/^\d{2,4}-\d{2,4}-\d{3,4}$/', $phone)) {
    $errors[] = '電話番号は正しい形式（例: 090-1234-5678）で入力してください。';
}
if ($message === '') {
    $errors[] = 'メッセージを入力してください。';
}

// エラーがあれば表示して終了
if (!empty($errors)) {
    echo "<h3>入力内容に不備があります。</h3>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</li>";
    }
    echo "</ul>";
    exit;
}


// ユーザーへの確認メール
$userMail = new PHPMailer(true);
try {
    $userMail->isSMTP();
    $userMail->Host       = $mailHost; // XサーバーのSMTP
    $userMail->SMTPAuth   = true;
    $userMail->Username   = $mailUser; // あなたのXサーバーメール
    $userMail->Password   = $mailPass;
    $userMail->SMTPSecure = $mailSecure;
    $userMail->Port       = $mailPort;
    $userMail->CharSet    = 'UTF-8';

    $userMail->setFrom($mailFaddress, $mailFname);
    $userMail->addAddress($email, $name);
    $userMail->Subject = '【おだちんTEST】お問い合わせありがとうございます';
    $userMail->Body    = <<<EOT
{$name}様

お問い合わせありがとうございます。
以下の内容で受け付けました。

名前: {$name}
メール: {$email}
メッセージ: 
{$message}

＝＝＝＝＝＝＝＝＝＝
おだちんTEST
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
    $adminMail->Host       = $mailHost; // XサーバーのSMTP
    $adminMail->SMTPAuth   = true;
    $adminMail->Username   = $mailUser;// あなたのXサーバーメール
    $adminMail->Password   = $mailPass;
    $adminMail->SMTPSecure = $mailSecure;
    $adminMail->Port       = $mailPort;
    $adminMail->CharSet    = 'UTF-8';

    $adminMail->setFrom($mailFaddress, $mailFname);
    $adminMail->addAddress($to_admin);
    // $adminMail->addAddress('akiyoshi.oda@gmail.com', 'おだちんさん');  // 管理者宛
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
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>情報入力フォーム</title>
</head>

<body>
  <h1>情報を入力してください</h1>
  <!-- <form action="." method="post"> -->
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    名前: <input type="text" name="username" /><br /><br />
    電話番号: <input type="text" name="phone" /><br /><br />
    メールアドレス: <input type="text" name="email" /><br /><br />
    メッセージ: <textarea name="message"></textarea><br /><br />
    <input type="submit" value="送信" />
  </form>
</body>

</html>