<?php  
class Car {
  public $color;

  public function drive(){
    echo "走っています！\n";
  }

}

class NewCar extends Car{
  public static $count = 0;
  public function __construct(){
    self::$count += 1;
  }

  public static function showCount(){
    echo self::$count;
    
  }
}

$car = new NewCar();
$car->color = "red";
$car->drive();
echo $car->color . "\n";

NewCar->showCount();

?>