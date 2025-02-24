package main

import "fmt"

type PrintShipment interface {
	ship() string
}

type Book struct {
	title string
}

func (b Book) ship() string {
	return b.title + " has been shipped."
}

type Ebook struct {
	title string
}

func (e Ebook) printDigital() string {
	return e.title + " is being printed."
}

type EbookPrint struct {
	ebook Ebook
}

func (e EbookPrint) ship() string {
	return e.ebook.printDigital() + " " + e.ebook.title + " has been shipped."
}

func main() {
	b := Book{
		title: "In Cold Blood",
	}
	bookShipped := b.ship()
	fmt.Println(bookShipped)

	e := Ebook{
		title: "Alice in Wonderland",
	}
	eb := EbookPrint{ebook: e}
	ebookShipped := eb.ship()
	fmt.Println(ebookShipped)
}
