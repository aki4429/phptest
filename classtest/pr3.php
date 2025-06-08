<?php 
class Car {
  public string $color;
  public function __construct($color){
    $this->color = $color;
  }

  public function driving(){
    echo "走っています！\n";
  }

}
class DisCar extends Car {
  public $distance = 0;
  public function drive($km){
    echo "{$km}km走りました！\n";
    $this->distance += $km;
  }

  public function getInfo(){
    echo "色：{$this->color}、走行距離：{$this->distance}km \n";
  }
}
$redCar = new DisCar("赤");
$blackCar = new DisCar("黒");

$redCar->drive(4);
$redCar->drive(5);
$blackCar->drive(2);
$blackCar->drive(3);
$blackCar->drive(6);

$redCar->getInfo();
$blackCar->getInfo();

?>