<?php  
//  練習1：引数なし関数
// 「こんにちは、PHP！」と表示する関数 sayHello() を定義して呼び出してください。
function sayHello(){
  echo "こんにちは、PHP!\n" ;
}
sayHello();

// ✅ 練習2：引数あり関数
// 名前を受け取って、「こんにちは、〇〇さん！」と表示する関数 greet($name) を作ってください。
function greet($name){
  echo "こんにちは、{$name}さん！\n" ;
}
greet("おだちん");

// ✅ 練習3：戻り値のある関数
// 2つの数値を受け取って合計を返す sum($a, $b) 関数を作り、結果を表示してください。
function sum($a, $b){
  return $a + $b ;
}
print_r(sum(2, 3). "\n");

// ✅ 練習4：デフォルト引数
// 引数が省略された場合、「ゲスト」としてあいさつする greet($name="ゲスト") を定義してください。
function greet2($name ="ゲスト"){
  echo "こんにちは、{$name}さん！\n" ;
}
greet2();


// ✅ 練習5：無名関数
// $double = function($n) { return $n * 2; }; のように、関数を変数に代入して使ってください。
// その後、$double(5) の結果を表示してください。
$double = function($n) { return $n * 2; }; 
print_r($double(5) . "\n");


//  練習1：関数の中で関数を使う（関数のネスト）
// ✅ 問題
// multiply 関数と double 関数を定義してください。
// その後、multiply(double(3), 4) を実行して結果を出力してください。
// 例）multiply(2, 4) => 8
// 例）double(3) => 6
function multiply($a, $b) {
  return $a * $b ;
}

function double($c) {
  return $c * 2 ;
}

$result = multiply(double(3), 4) ;
print_r ($result) ;
print_r ("\n") ;

// ✅ 問題
// 連想配列でユーザー情報が入っているとします。

// $user = ["name" => "Taro", "age" => 30, "email" => "taro@example.com"];
// この $user を受け取って、次のように出力する関数 printUserInfo($user) を作ってください：

// text
// コピーする
// 編集する
// 名前: Taro
// 年齢: 30
// メール: taro@example.com
$user = ["name" => "Taro", "age" => 30, "email" => "taro@example.com"];
function printUserInfo($user) {
  echo "名前: " . $user["name"] ."\n" ;
  echo "年齢: " . $user["age"]  ."\n";
  echo "メール: " . $user["email"]  ."\n";
}
printUserInfo($user) ;

// 配列の中に複数のユーザー連想配列があるとします。
$users = [
  ["name" => "Taro", "age" => 30, "email" => "taro@example.com"],
  ["name" => "Hanako", "age" => 28, "email" => "hanako@example.com"]
];

// すべてのユーザー情報を出力する printAllUsers($users) を作ってみましょう。
function printAllUserInfo($users) {
  foreach($users as $user) {
    printUserInfo($user) ;
  }
}
printAllUserInfo($users) ;



?>