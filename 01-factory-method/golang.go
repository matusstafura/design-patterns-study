package main

import "fmt"

type PaymentGateway interface {
	pay(n int)
}

type Stripe struct {
	Amount int
}

func newStripe(n int) *Stripe {
	return &Stripe{
		Amount: n,
	}
}

func (s Stripe) pay(n int) {
	fmt.Print("paid by stripe", n)
}

type Paypal struct {
	Amount int
}

func newPaypal(n int) *Paypal {
	return &Paypal{
		Amount: n,
	}
}

func (p Paypal) pay(n int) {
	fmt.Print("paid by paypal")
}

type Notification struct{}

func NewPaymentGateway(gatewayType string, amount int) PaymentGateway {
	if gatewayType == "stripe" {
		return newStripe(amount)
	} else if gatewayType == "paypal" {
		return newPaypal(amount)
	}
	return nil
}

func notify(p PaymentGateway, n int) {
	p.pay(n)
}

func main() {
	s := NewPaymentGateway("stripe", 10)
	notify(s, 10)
}
