<?php
$host = 'localhost';  // XAMPPならlocalhost
$dbname = 'test_db';
$user = 'root';       // XAMPPのデフォルトユーザー
$pass = '';           // パスワード空（初期状態）

try {
  // PDOでデータベースに接続
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // SELECT文の実行
  $sql = "SELECT * FROM users";
  $stmt = $pdo->query($sql);

  // 結果の表示
  foreach ($stmt as $row) {
    echo "ID: {$row['id']}、名前: {$row['name']}、メール: {$row['email']}<br>";
  }

} catch (PDOException $e) {
  echo "接続エラー: " . $e->getMessage();
}
?>