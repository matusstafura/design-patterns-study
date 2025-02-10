package main

import "fmt"

// PaymentGateway is a product interface
type PaymentGateway interface {
	pay(n int)
}

// Stripe is a concrete product
type Stripe struct {
	Amount int
}

func (s Stripe) pay(n int) {
	fmt.Print("paid by stripe: ", n)
}

// Paypal is a concrete product
type Paypal struct {
	Amount int
}

func (p Paypal) pay(n int) {
	fmt.Print("paid by paypal: ", n)
}

type PaymentFactory interface {
	createPayment(amount int) PaymentGateway
}

type StripeFactory struct{}

func (s StripeFactory) createPayment(amount int) PaymentGateway {
	return newStripe(amount)
}

type PaypalFactory struct{}

func (p PaypalFactory) createPayment(amount int) PaymentGateway {
	return newPaypal(amount)
}

// Factory method
func newStripe(n int) *Stripe {
	return &Stripe{
		Amount: n,
	}
}

// Factory method
func newPaypal(n int) *Paypal {
	return &Paypal{
		Amount: n,
	}
}

// Client code
func processPayment(factory PaymentFactory, amount int) {
	payment := factory.createPayment(amount)
	payment.pay(amount)
}

func main() {
	processPayment(StripeFactory{}, 100) // Outputs: paid by stripe 100
	processPayment(PaypalFactory{}, 100) // Outputs: paid by paypal 100
}
