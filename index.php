<?php

global $books;
global $cartItems;

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://avatars.githubusercontent.com/u/68622328?s=200&v=4" type="png">
    <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/68622328?s=200&v=4" type="png">
    <title>Buchshop.at</title>
    <link rel="stylesheet" href="lib/css/style.css">
    <script src="index.js" defer></script>
</head>
<body>
<header>
    <div class="topbar">
        <img src="images/knossi.jpg" width="150px" height="150px" style="margin-left: 10px">
        <h1>Knossis Buchshop</h1>
        <div class="cart-icon"><a href="warenkorb.php">&#128722;</a></div>
    </div>
</header>

<h2 class="shoptitle">Unser Sortiment:</h2>
<div class="shop">
    <?php
    include "lib/BookManager.php";
    ?>

</div>
<footer>

</footer>
</body>
</html>
