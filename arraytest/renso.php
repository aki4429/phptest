<?php 
// copilot:enable
// copilot:disable

// user = {"name": "Taro", "age": 30}
// print(user["name"])
$user = ["name" => "Taro", "age" => 30];
echo $user["name"] . "\n"; // Taro

//user["email"] = "taro@example.com"
$user["email"] = "taro@example.com" ;

print_r($user); // 配列の内容を表示

// for k, v in user.items():
// print(f"{k}: {v}")
foreach($user as $k => $v) {
  echo $k . ": " . $v  . "\n";
}

// 練習4
// if "name" in user:
//     print("あるよ")
if( array_key_exists("name", $user)) {
  echo "name あるよ！\n" ;
}

// 練習5
// del user["age"]
unset($user["age"]);
print_r($user); // 配列の内容を表示

// 練習6
// for k in user.keys():
//     print(k)
foreach($user as $k => $v) {
  echo $k . "\n";
}
foreach (array_keys($user) as $k) {
  echo $k . "\n";
}


// 練習7
// for v in user.values():
//     print(v)
foreach($user as $k => $v) {
  echo $v . "\n";
}
foreach ($user as $v) {
  echo $v . "\n";
}

$user["country"] = "japan";
$user["sex"] = "male";
$user["tel"] = "123-4567";

print_r($user);
ksort($user);
print_r($user);
asort($user);
print_r($user);
$user_json = json_encode($user) ;
print_r($user_json) ;
print_r(json_decode($user_json)) ;

//値に'a'含む連想配列を抽出
$include_a = array_filter($user, function($v){
  return  strpos($v, "a") !== false;
});
print_r($include_a);

 ?>