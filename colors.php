<?php
$colors = ["red", "green", "blue", "yellow", "purple", "orange"];
$colors[] ="black"; // 末尾に"black"を追加
$colors[1] = "white"; // "green"を"white"に変更
unset($colors[3]); // "yellow"を削除
array_splice($colors, 2, 0, "pink"); // "blue"の前に"pink"を挿入


foreach ($colors as $color) {
    echo "$color\n";
}