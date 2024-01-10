<?php
include "lib/BookManager.php";
include "lib/shoppingCart.php";

$books = Book::getBooks();
$cartItems = $cart->getCartItems();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buchshop.at</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="topbar">
        <h1>Buchkaufen machen</h1>
        <div class="cart-icon"><a href="lib/shoppingCart.php">&#128722;</a></div>
    </div>
</header>
<div>
    <h2>Unser Sortiment:</h2>
    <form method="post" action="">
        <?php foreach ($books as $book): ?>
            <div class="book">
                <h3><?= $book->getTitle() ?></h3>
                <p>Produktnummer: <?= $book->getId() ?></p>
                <p>Preis: <?= $book->getPrice() ?> €</p>
                <p>Stück auf Lager: <?= $book->getStock() ?></p>
                <input type="number" class="quantity-input" value="1" min="1" name="quantity[<?= $book->getId() ?>]">
                <input type="hidden" name="book-id" value="<?= $book->getId() ?>">
                <button class="add-to-cart" name="add-to-cart" type="submit">Diese kaufen ich</button>
            </div>
        <?php endforeach; ?>
    </form>
</div>
<footer>
</footer>
</body>
</html>
