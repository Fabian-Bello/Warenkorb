<?php

global $books;
global $cartItems;



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
    <?php

    include "lib/BookManager.php";
    ?>

</div>
<footer>
</footer>
</body>
</html>
