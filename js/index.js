document.addEventListener('DOMContentLoaded', function () {

    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            var bookId = event.target.dataset.bookId;
            var quantity = event.target.parentNode.querySelector('.quantity-input').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'lib/cartController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {

                    alert('Buch wurde zum Warenkorb hinzugefügt!');
                }
            };
            xhr.send('add-to-cart=true&book-id=' + bookId + '&quantity=' + quantity);
        });
    });
    var cartIcon = document.querySelector('.cart-icon a');
    cartIcon.addEventListener('click', function () {

        alert('Warenkorb anzeigen!');
    });
});
