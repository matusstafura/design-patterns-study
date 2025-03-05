package main

import "fmt"

type Item interface {
	show()
}

type Product struct {
	Name string
}

func (p *Product) show() {
	fmt.Println(" -", p.Name)
}

type Box struct {
	Name     string
	Children []Item
}

func (b *Box) show() {
	fmt.Println(b.Name)
	for i := 0; i < len(b.Children); i++ {
		b.Children[i].show()
	}
}

func (b *Box) add(item Item) {
	b.Children = append(b.Children, item)
}

func main() {
	p1 := &Product{Name: "Shirt"}
	p2 := &Product{Name: "Suit"}
	p3 := &Product{Name: "Tie"}

	premium := &Box{Name: "Premium"}
	premium.add(p1)
	premium.add(p2)
	premium.add(p3)

	premium.show()
}
