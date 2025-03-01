<?php

interface Item
{
    public function package(): void;
    public function add(Item $item): void;
}

class Product implements Item
{
    public function __construct(private string $name)
    {
    }
    public function package(): void
    {
        echo "- " . $this->name . "\n";
    }

    public function add(Item $item): void
    {
        throw new Exception("Cannot add items to a product.");
    }
}

class Box implements Item
{
    private array $children = [];
    public function __construct(private string $name)
    {
    }
    public function add(Item $item): void
    {
        $this->children[] = $item;
    }
    public function package(): void
    {
        echo "+ " . $this->name . "\n";

        foreach ($this->children as $child) {
            $child->package();
        }
    }
}

$p1 = new Product("Book");
$p2 = new Product("Pen");

$box1 = new Box("Gift Wrap");

$box1->add($p1);
$box1->add($p2);

$box1->package();

