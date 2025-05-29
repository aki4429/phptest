<?php 
$email = "taro@example.com"; 
// if(preg_match("/^.+@.+\..+/", $email)){
if(preg_match("/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/", $email)){
  echo "メールアドレスの形式に一致します！\n";
}else{ echo "メールアドレスの形式に一致しません!\n";
}

 $text = "商品Aは120円、商品Bは340円、合計460円です。";
 preg_match_all("/\d+/", $text, $numbers) ;
 print_r($numbers);

 $phone = "090-1234-5678";
 echo preg_replace("/\-/", "_", $phone);

 $sentence = "I love PHP and Laravel!";
 $result = preg_split("/[^\w]+/", $sentence) ;
 print_r($result) ;


 $html = "<p>Hello <strong>World</strong>!</p>";
echo  preg_replace("/\<[a-zA-Z\/][a-zA-Z\d]*\>/", "", $html);

?>