<?php

namespace App\Repository;

use Framework\Repository\Model;

class AdRecord implements Model
{
    private $id;
    private $name;
    private $text;
    private $keywords;
    private $price;

    public static function fromState(array $state): self
    {
        return new self(
            $state['id'] ?? null,
            $state['name'] ?? null,
            $state['text'] ?? null,
            $state['keywords'] ?? null,
            $state['price'] ?? null
        );
    }

    public function __construct($id, $name, $text, $keywords, $price)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->text     = $text;
        $this->keywords = $keywords;
        $this->price    = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceByCurrency($currency)
    {
        return $this->price * $currency;
    }
}