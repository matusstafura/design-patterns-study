package main

import "fmt"

type Notification interface {
	send(message string)
}

type Email struct{}

func (e *Email) send(message string) {
	fmt.Println("Sending email: " + message)
}

type SMS struct{}

func (s *SMS) send(message string) {
	fmt.Println("Sending SMS: " + message)
}

type Importance interface {
	sendMessage(message string)
}

type OrderNotification struct {
	Notification Notification
}

func (o *OrderNotification) sendMessage(message string) {
	o.Notification.send(message)
	fmt.Println("Order notification sent.")
}

type ShippingNotification struct {
	Notification Notification
}

func (s *ShippingNotification) sendMessage(message string) {
	s.Notification.send(message)
	fmt.Println("Shipping notification sent.")
}

func main() {
	e := &Email{}
	o := OrderNotification{Notification: e}
	o.sendMessage("Order #123 has been processed.")

	s := &SMS{}
	n := ShippingNotification{Notification: s}
	n.sendMessage("Order #236 has been shipped.")
}
