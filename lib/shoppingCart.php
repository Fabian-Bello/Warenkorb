<?php

namespace lib;

require_once 'Cart.php';

$cart = new Cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add-to-cart'])) {
        $bookId = $_POST['book-id'];
        $quantity = $_POST['quantity'];

        $book = Book::get($bookId);
        $cart->add($book, $quantity);
    } elseif (isset($_POST['remove-from-cart'])) {
        $bookId = $_POST['book-id'];
        $cart->remove($bookId);;
    }
}
?>
