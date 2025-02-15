from __future__ import annotations
from abc import ABC, abstractmethod
from typing import Protocol

class Service(ABC):
    @abstractmethod
    def create_sender(self) -> MessageSender:
        pass

    @abstractmethod
    def create_logger(self) -> MessageLogger:
        pass

class EmailService(Service):
    def create_sender(self) -> MessageSender:
        return EmailSender()

    def create_logger(self) -> MessageLogger:
        return EmailLogger()

class SMSService(Service):
    def create_sender(self) -> MessageSender:
        return SMSSender()

    def create_logger(self) -> MessageLogger:
        return SMSLogger()

class MessageSender(Protocol):
    def send(self) -> None:
        pass

class MessageLogger(Protocol):
    def log(self) -> None:
        pass

class EmailSender(MessageSender):
    def send(self) -> None:
        print("email has been sent")

class EmailLogger(MessageLogger):
    def log(self) -> None:
        print("email has been logged")

class SMSSender(MessageSender):
    def send(self) -> None:
        print("sms has been sent")

class SMSLogger(MessageLogger):
    def log(self) -> None:
        print("sms has been logged")

class Client:
    def __init__(self, service: Service) -> None:
        self.sender = service.create_sender()
        self.logger = service.create_logger()

    def process(self) -> None:
        self.sender.send()
        self.logger.log()

def main():
    emailService = EmailService()
    client = Client(emailService)
    client.process()

    smsService = SMSService()
    client = Client(smsService)
    client.process()

if __name__ == "__main__":
    main()

