<?php
$jsonData = file_get_contents('lib/booksdata.json');

$dataArray = json_decode($jsonData, true);

if (isset($dataArray)) {

    foreach ($dataArray as $item) {
        echo '<div class="book">';
        echo '    <h3>' . $item['title'] . '</h3>';
        echo '    <p>Produktnummer: ' . $item['id'] . '</p>';
        echo '    <p>Preis: ' . $item['price'] . ' €' . '</p>';
        echo '    <p>Stück auf Lager: ' . $item['stock'] . '</p>';
        echo ' <input type="number" class="quantity-input" value="1" min="1">';
        echo ' <button class="add-to-cart">Diese kaufen ich</button>';
        echo '</div>';
    }
} else {
    echo 'JSON nix gut';

}

?>

