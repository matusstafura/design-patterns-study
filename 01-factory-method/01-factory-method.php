<?php

// Product Interface
interface Notification
{
    public function send(string $message): void;
}

// Concrete Class
class EmailNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Sent Email: $message";
    }
}

// Concrete Class
class SmsNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Sent SMS: $message";
    }
}

// Factory Method in the Base Class
abstract class NotificationService
{
    abstract protected function createNotification(): Notification;

    public function notify(string $message): void
    {
        $notification = $this->createNotification();
        $notification->send($message);
    }
}

// Concrete Factory
class EmailService extends NotificationService
{
    protected function createNotification(): Notification
    {
        return new EmailNotification();
    }
}

// Concrete Factory
class SmsService extends NotificationService
{
    protected function createNotification(): Notification
    {
        return new SmsNotification();
    }
}

// Client Code
class Client
{
    public function __construct(protected NotificationService $service)
    {
    }

    public function sendMessage(string $message = "Default Message"): void
    {
        $this->service->notify($message);
    }
}

// Usage
$client = new Client(new EmailService());
$client->sendMessage("Hello via Email!"); // Outputs: Sent Email: Hello via Email!

$client = new Client(new SmsService());
$client->sendMessage("Hello via SMS!"); // Outputs: Sent SMS: Hello via SMS!

