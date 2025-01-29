<?php

interface Notification
{
    public function send(string $message): void;
}

// Concrete Classes
class EmailNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Sent Email: $message";
    }
}

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

// Concrete Factories
class EmailService extends NotificationService
{
    protected function createNotification(): Notification
    {
        return new EmailNotification();
    }
}

class SmsService extends NotificationService
{
    protected function createNotification(): Notification
    {
        return new SmsNotification();
    }
}

// Usage
$service = new EmailService();
$service->notify("Hello via Email!"); // Outputs: Sent Email: Hello via Email!

$service = new SmsService();
$service->notify("Hello via SMS!"); // Outputs: Sent SMS: Hello via SMS!
