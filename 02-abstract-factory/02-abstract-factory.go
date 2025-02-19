package main

import "fmt"

// NotificationFactory defines an abstract factory for notifications
type NotificationFactory interface {
	CreateMsg() MessageSender
	CreateLog() MessageLogger
}

// MessageSender defines an interface for sending messages
type MessageSender interface {
	Send(msg string)
}

// MessageLogger defines an interface for logging messages
type MessageLogger interface {
	Log(msg string)
}

// EmailNotificationFactory implements NotificationFactory
type EmailNotificationFactory struct{}

func NewEmailNotificationFactory() NotificationFactory {
	return &EmailNotificationFactory{}
}

func (e *EmailNotificationFactory) CreateMsg() MessageSender {
	return &EmailSender{}
}

func (e *EmailNotificationFactory) CreateLog() MessageLogger {
	return &EmailLogger{}
}

// SMSNotificationFactory implements NotificationFactory
type SMSNotificationFactory struct{}

func NewSMSNotificationFactory() NotificationFactory {
	return &SMSNotificationFactory{}
}

func (s *SMSNotificationFactory) CreateMsg() MessageSender {
	return &SMSSender{}
}

func (s *SMSNotificationFactory) CreateLog() MessageLogger {
	return &SMSLogger{}
}

// EmailSender implements MessageSender
type EmailSender struct{}

func (e *EmailSender) Send(msg string) {
	fmt.Println("EmailSender:", msg)
}

// EmailLogger implements MessageLogger
type EmailLogger struct{}

func (e *EmailLogger) Log(msg string) {
	fmt.Println("EmailLogger:", msg)
}

// SMSSender implements MessageSender
type SMSSender struct{}

func (s *SMSSender) Send(msg string) {
	fmt.Println("SMSSender:", msg)
}

// SMSLogger implements MessageLogger
type SMSLogger struct{}

func (s *SMSLogger) Log(msg string) {
	fmt.Println("SMSLogger:", msg)
}

func main() {
	// Create Email Notification Factory
	emailFactory := NewEmailNotificationFactory()
	emailMsg := emailFactory.CreateMsg()
	emailLog := emailFactory.CreateLog()

	emailMsg.Send("Hello via Email")
	emailLog.Log("Email Log Entry")

	// Create SMS Notification Factory
	smsFactory := NewSMSNotificationFactory()
	smsMsg := smsFactory.CreateMsg()
	smsLog := smsFactory.CreateLog()

	smsMsg.Send("Hello via SMS")
	smsLog.Log("SMS Log Entry")
}
