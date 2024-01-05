<?php
namespace lib;

class Book
{
private $id = 0;
private $title = 'book_title';
private $price = 0.00;
private $stock = 0;

public function __construct($id, $title, $price, $stock)
{
$this->id = $id;
$this->title = $title;
$this->price = $price;
$this->stock = $stock;
}

public function getTitle()
{
return $this->title;
}

public static function getBooks()
{

$jsonData = file_get_contents("bookdata.json");

if ($jsonData === false) {
return [];
}

$booksJson = json_decode($jsonData, true);

$books = [];
foreach ($booksJson as $book) {
$bookObject = new Book($book['id'], $book['title'], $book['price'], $book['stock']);
$books[] = $bookObject;
}

return $books;
}
}

$books = Book::getBooks();

foreach ($books as $b) {
echo $b->getTitle() . "<br>";
}
