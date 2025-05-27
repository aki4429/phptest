<?php
//練習３の倍数だけ取り出す
$numbers = range(1, 100); // 1から100までの配列を作成
$keynum = 3;
$oknums = array_filter( $numbers, function($v) use ($keynum) {
    return $v % $keynum === 0; // 3の倍数をチェック
});

foreach ($oknums as $num) {
    echo "$num\n"; // 3の倍数を出力
} 

//練習文字列を大文字に変換する
$strings = ["apple", "banana", "cherry"];

$result_array = array_map(function($str) {
    return strtoupper($str); // 文字列を大文字に変換
}, $strings);  

foreach ($result_array as $num) {
    echo "$num\n"; // 大文字を出力
} 