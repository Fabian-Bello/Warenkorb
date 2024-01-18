document.addEventListener('DOMContentLoaded', function () {

    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            console.log('Button clicked');
            var bookId = event.target.dataset.bookId || event.target.getAttribute('data-book-id');
            var quantity = event.target.parentNode.querySelector('.quantity-input').value;

            addToCart(bookId, quantity);
        });
    });

    var cartIcon = document.querySelector('.cart-icon a');
    cartIcon.addEventListener('click', function () {
        console.log('Cart icon clicked');
    });
});

function addToCart(bookId, quantity) {
    console.log('Adding to cart:', bookId, quantity);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'lib/cartController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Book added to cart successfully');
            alert('Buch wurde zum Warenkorb hinzugefügt!');
        }
    };
    xhr.send('add-to-cart=true&book-id=' + bookId + '&quantity=' + quantity);
}
