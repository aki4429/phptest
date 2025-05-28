<?php  
// 🔹 練習1：文字列を大文字・小文字に変換
$name = "OdaChin";
echo strtoupper($name) . "\n";  // ODA...
echo strtolower($name) . "\n";  // oda...



// 🔹 練習2：3文字目を取り出す（0番から数える）
// $name = "OdaChin";
echo $name[2] . "\n"; // a


// 🔹 練習3："Hello OdaChin" の "OdaChin" を "User" に変えて表示
$text = "Hello OdaChin";
$newText = str_replace("OdaChin", "User", $text);
echo $newText . "\n"; // Hello User

// 🔹 練習4：文字列 "red,green,blue" を配列に変換して1つずつ表示
$colors = "red,green,blue";
$arr = explode(",", $colors);
foreach ($arr as $c) {
    echo $c . "\n";
}

// 🔹 練習5：1文字ずつ逆順にして出力
$text = "abcdeffgghhhh";
echo strrev($text) . "\n"; // PHP → PHP

$message = "私はPHPが大好きです！";
$keyword = "PHP";
if(str_contains($message, $keyword)) {
  echo "{$keyword}ありました！" ;
}else {
  echo "{$keyword}ありません！" ;
}

?>