<?php  
class Book{
  public $title;
  public $author;

  public function __construct($title, $author){
    $this->title = $title;
    $this->author = $author;
  }
  public function displayInfo(){
    echo "タイトル：" . $this->title . "、著者：" . $this->author . "\n" ;
  }
}

$bookData = [];
$bookData[] = ["PHPフレームワーク Laravel入門 第3版", "掌田 津耶乃"];
$bookData[] = ["見てわかる Unity 6 超入門", "掌田 津耶乃"];
$bookData[] = ["コトラーのマーケティング3.0", "フィリップ・コトラー"];
$bookData[] = ["初心者のためのPython活用術", "日経ソフトウエア"];
// print_r($bookData);
foreach($bookData as $bd){
  $book =  new Book($bd[0], $bd[1]);
  $book->displayInfo();
}
?>