<?php

// 1. Abstract Factory Interface
// Defines methods to create different types of related objects (Sender & Logger)
interface NotificationService
{
    public function createSender(): MessageSender;
    public function createLogger(): MessageLogger;
}

// 2. Concrete Factories
// Each factory creates a family of related objects (Email or SMS)

class EmailNotificationService implements NotificationService
{
    public function createSender(): MessageSender
    {
        return new EmailSender();
    }

    public function createLogger(): MessageLogger
    {
        return new EmailLogger();
    }
}

class SMSNotificationService implements NotificationService
{
    public function createSender(): MessageSender
    {
        return new SMSSender();
    }

    public function createLogger(): MessageLogger
    {
        return new SMSLogger();
    }
}

// 3. Abstract Product Interfaces
// These define the behaviors for sending messages and logging them

interface MessageSender
{
    public function send(string $recipient, string $message): string;
}

interface MessageLogger
{
    public function log(string $message): string;
}

// 4. Concrete Products
// Implementations for Email Notifications

class EmailSender implements MessageSender
{
    public function send(string $recipient, string $message): string
    {
        return "Sent Email to $recipient: $message\n";
    }
}

class EmailLogger implements MessageLogger
{
    public function log(string $message): string
    {
        return "Email Log: $message\n";
    }
}

// Implementations for SMS Notifications
class SMSSender implements MessageSender
{
    public function send(string $recipient, string $message): string
    {
        return "Sent SMS to $recipient: $message\n";
    }
}

class SMSLogger implements MessageLogger
{
    public function log(string $message): string
    {
        return "SMS Log: $message\n";
    }
}

// 5. Client Code
// The client does not need to know if it is using Email or SMS.
// It only works with the NotificationService interface.

function sendNotification(NotificationService $service, string $recipient, string $message)
{
    $sender = $service->createSender();
    echo $sender->send($recipient, $message);

    $logger = $service->createLogger();
    echo $logger->log($message);
}

// Example usage
sendNotification(new EmailNotificationService(), "user@example.com", "Hello via Email!");
sendNotification(new SMSNotificationService(), "+123456789", "Hello via SMS!");

