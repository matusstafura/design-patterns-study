from abc import ABC, abstractmethod

class Notification(ABC):
    @abstractmethod
    def send(self, message):
        pass

class EmailNotification(Notification):
    def send(self, message):
        print(f"email notification: {message}.")

class PushNotification(Notification):
    def send(self, message):
        print(f"push notification: {message}.")

class Importance(ABC):
    def __init__(self, notification: Notification):
        self.notification = notification

    @abstractmethod
    def send_message(self, message):
        pass

class UrgentNotification(Importance):
    def send_message(self, message):
        self.notification.send(message)
        print("this is urgent.")

class ReportNotification(Importance):
    def send_message(self, message):
        self.notification.send(message)
        print("this is a report:")

e = EmailNotification()
u = UrgentNotification(e)
u.send_message("server down")

p = PushNotification()
r = ReportNotification(p)
r.send_message("CPU is at 60%")
