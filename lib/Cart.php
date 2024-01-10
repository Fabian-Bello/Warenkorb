<?php

namespace lib;

class Cart
{
    private $cartItems = [];

    public function __construct()
    {
        $this->loadCookie();
    }

    private function loadCookie()
    {
        if (isset($_COOKIE['cart'])) {
            $cartData = json_decode($_COOKIE['cart'], true);

            foreach ($cartData as $itemData) {
                $book = Book::get($itemData['id']);
                $this->add($book, $itemData['count']);
            }
        }
    }

    private function saveCookie()
    {
        $cartData = [];

        foreach ($this->cartItems as $cartItem) {
            $cartData[] = [
                'id' => $cartItem->getBook()->getId(),
                'count' => $cartItem->getCount(),
            ];
        }

        setcookie('cart', json_encode($cartData), time() + (86400 * 30), "/"); // 86400 = 1 day
    }

    public function add($book, $count)
    {
        $cartItem = $this->findCartItem($book->getId());

        if ($cartItem) {
            $cartItem->increaseCount($count);
        } else {
            $cartItem = new CartItem($book, $count);
            $this->cartItems[] = $cartItem;
        }

        $this->saveCookie();
    }

    public function remove($id)
    {
        $this->cartItems = array_filter($this->cartItems, function ($cartItem) use ($id) {
            return $cartItem->getBook()->getId() != $id;
        });

        $this->saveCookie();
    }

    public function getCartItems()
    {
        return $this->cartItems;
    }

    public function getTotalPrice()
    {
        $total = 0;

        foreach ($this->cartItems as $cartItem) {
            $total += $cartItem->getTotalPrice();
        }

        return $total;
    }

    private function findCartItem($id)
    {
        foreach ($this->cartItems as $cartItem) {
            if ($cartItem->getBook()->getId() == $id) {
                return $cartItem;
            }
        }

        return null;
    }


}
