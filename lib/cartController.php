<?php
namespace lib;

require_once 'Cart.php';
require_once 'Book.php';

$cart = new Cart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add-to-cart'])) {
        $bookId = $_POST['book-id'];
        $quantity = $_POST['quantity'];

        $book = Book::get($bookId);

        if ($book) {
            $cart->add($book, $quantity);
            echo json_encode(['status' => 'success', 'message' => 'Buch wurde zum Warenkorb hinzugefügt.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Buch konnte nicht gefunden werden.']);
        }
    } elseif (isset($_POST['remove-from-cart'])) {
        $bookId = $_POST['book-id'];
        $cart->remove($bookId);
        echo json_encode(['status' => 'success', 'message' => 'Buch wurde aus dem Warenkorb entfernt.']);
    }
}
?>
