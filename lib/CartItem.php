<?php

namespace lib;

class CartItem
{
    private $book;
    private $count;

    public function __construct($book, $count)
    {
        $this->book = $book;
        $this->count = $count;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function increaseCount($count)
    {
        $this->count += $count;
    }

    public function decreaseCount($count)
    {
        $this->count -= $count;

        if ($this->count <= 0) {
            $this->count = 1;
        }
    }

    public function getTotalPrice()
    {
        return $this->book->getPrice() * $this->count;
    }
}
