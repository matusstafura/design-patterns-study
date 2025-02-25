from abc import ABC, abstractmethod

class USBC(ABC):
    @abstractmethod
    def connect(self):
        raise NotImplementedError("Subclass must implement connect()")

class Phone(USBC):
    def connect(self):
        return "phone charging"

class Headphones:
    def plug(self):
        return "adding connector"

class HeadphonesUSBC(USBC):
    def __init__(self, headphones: Headphones):
        self.headphones = headphones

    def connect(self):
        return self.headphones.plug() + " and headphones charging."


headphones = Headphones()
headphones_adapter = HeadphonesUSBC(headphones)
print(headphones_adapter.connect())
