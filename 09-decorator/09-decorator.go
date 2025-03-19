package main

import "fmt"

type Shipping interface {
	cost() int
	description() string
}

type Standard struct {
}

func (s *Standard) cost() int {
	return 5
}

func (s *Standard) description() string {
	return "Standard shipping"
}

type ShippingDecorator struct {
	shipping Shipping
}

func (s *ShippingDecorator) cost() int {
	return s.shipping.cost()
}

func (s *ShippingDecorator) description() string {
	return s.shipping.description()
}

type CashOnDelivery struct {
	Shipping
}

func (c *CashOnDelivery) cost() int {
	return c.Shipping.cost() + 2
}

func (c *CashOnDelivery) description() string {
	return c.Shipping.description() + " + cash on delivery fee"
}

func main() {
	s := &Standard{}
	cod := &CashOnDelivery{Shipping: s}
	fmt.Println(cod.description(), cod.cost())
}
