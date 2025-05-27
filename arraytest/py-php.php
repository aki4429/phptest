<?php 
  $colors= ["red", "green", "blue"];
// 練習1
  // $colors[] = "yellow"; // 末尾に"yellow"を追加
  array_push($colors, "yellow"); // 末尾に"yellow"を追加

// 練習2
  // array_splice($colors, 0, 0, "white"); // "red"の前に"white"を挿入
  array_unshift($colors, "white"); // "red"の前に"white"を挿入

// 練習3
  array_splice($colors, 2, 0, "grey"); // "red"の前に"white"を挿入

// 練習4
  unset(array_search("green", $colors)[0]); // "green"を削除
  $index = array_search("green", $colors);
  if ($index !== false) {
      unset($colors[$index]); // "green"を削除
  }

// 練習5
  unset($colors[1]); // "white"を削除

  $colors= ["red", "green", "blue"];
// 練習6
$colors = array_reverse($colors); // 配列を逆順にする

// 練習7
sort($colors); // 配列をソートする

// 練習8
$colors2 = ["yellow", "purple", "orange"];
$colors = array_merge($colors, $colors2); // 2つの配列を結合する

// 練習9
if (in_array("blue", $colors)) {
    echo "blue あるよ！\n"; // "blue"が存在する場合のメッセージ 
}

// 練習10
$lenlimit = 4; // 文字列の長さ制限
$colors = array_filter($colors, function($color) use ($lenlimit) {
    return strlen($color) > $lenlimit; // 文字列の長さが制限以上かチェック
});


  foreach ($colors as $color) {
      echo "$color\n";
  }