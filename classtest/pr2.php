<?php 
class User{
  public string $name;
  public static int $count = 0;
  public function __construct($name){
    $this->name = $name;
    self::$count += 1;
  }
  public static function getCount(){
    echo "ユーザー数は" . self::$count . "です \n";
  }
}
$users = [];
$users[] = new User("山田");
$users[] = new User("田中");
$users[] = new User("鈴木");
foreach($users as $user) {
  echo $user->name . "\n" ;
}
User::getCount();

?>