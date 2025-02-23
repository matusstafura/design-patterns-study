<?php

interface ProductShipment
{
    public function ship(): string;
}

// adaptee
class Book implements ProductShipment
{
    public function __construct(private string $title)
    {
    }

    public function ship(): string
    {
        return "{$this->title} has been shipped.";
    }
}

// does not implement ProductShipment
class EBook
{
    public function __construct(private string $title)
    {
    }

    public function printDigital(): string
    {
        return "Printing {$this->title} on paper.";
    }

    public function bind(): string
    {
        return $this->printDigital() . " Binding {$this->title}.";
    }
}

// Adapter
class EBookAdapter implements ProductShipment
{
    public function __construct(private EBook $ebook)
    {
    }

    // Adapting the interface
    public function ship(): string
    {
        return $this->ebook->bind() . " Shipping physical copy of eBook.";
    }
}

// Client Code
$book = new Book("In Cold Blood");
echo $book->ship() . PHP_EOL;

$ebook = new EBook("The Art Of War");
$ebookAdapter = new EBookAdapter($ebook);
echo $ebookAdapter->ship() . PHP_EOL;

