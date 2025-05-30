<?php
// phpinfo();
// SQLite データベースに接続（ファイルがなければ作成される）
$db = new SQLite3('test.db');

// テーブルがなければ作成（最初だけ実行）
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)");

// ダミーデータを追加（重複しないよう注意）
$db->exec("INSERT INTO users (name, email) VALUES ('Taro', 'taro@example.com')");
$db->exec("INSERT INTO users (name, email) VALUES ('Jiro', 'jiro@example.com')");
$db->exec("INSERT INTO users (name, email) VALUES ('Sabro', 'sabro@example.com')");

// データを取得（SELECT文）
$result = $db->query("SELECT * FROM users");

// 結果を表示
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: " . $row['id'] . "\n";
    echo "名前: " . $row['name'] . "\n";
    echo "メール: " . $row['email'] . "\n";
    echo "------\n";
}

// 接続を閉じる
$db->close();
?>