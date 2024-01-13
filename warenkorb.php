<?php
require_once 'lib/Cart.php'; // Stelle sicher, dass die Datei korrekt eingebunden ist
$cart = new lib\Cart(); // Erstelle eine Instanz der Cart-Klasse
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://avatars.githubusercontent.com/u/68622328?s=200&v=4" type="png">
    <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/68622328?s=200&v=4" type="png">
    <title>Warenkorb - Buchshop.at</title>
    <link rel="stylesheet" href="lib/css/warenkorb.css">
</head>
<body>
<header>
    <h1>Warenkorb</h1>
</header>

<section>
    <h2>Ihr Warenkorb:</h2>

    <?php
    // Hier wird der Warenkorb-Inhalt angezeigt
    $cartItems = $cart->getCartItems();

    if (empty($cartItems)) {
        echo '<p>Der Warenkorb ist leer.</p>';
    } else {
        foreach ($cartItems as $cartItem) {
            $book = $cartItem->getBook();
            $quantity = $cartItem->getCount();
            ?>
            <div class="cart-item">
                <h3><?= $book->getTitle(); ?></h3>
                <p>Preis pro Stück: <?= $book->getPrice(); ?> €</p>
                <p>Anzahl: <?= $quantity; ?></p>
                <p>Gesamtpreis: <?= $cartItem->getTotalPrice(); ?> €</p>
                <form action="lib/cartController.php" method="post">
                    <input type="hidden" name="book-id" value="<?= $book->getId(); ?>">
                    <input type="submit" name="remove-from-cart" value="Aus Warenkorb entfernen">
                </form>
            </div>
            <?php
        }

        echo '<p><strong>Gesamtsumme: ' . $cart->getTotalPrice() . ' €</strong></p>';
    }
    ?>
</section>

<footer>
    <a href="index.php">Zurück zum Shop</a>
</footer>
</body>
</html>
