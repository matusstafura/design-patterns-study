from abc import ABC, abstractmethod

class Item(ABC):
    @abstractmethod
    def package(self):
        pass

class Product(Item):
    def __init__(self, title):
        self.title = title

    def package(self):
        print(f"  - {self.title}")

class Box(Item):
    def __init__(self, title):
        self.title = title
        self.children = []

    def package(self):
        print(f"Box: {self.title}")
        for child in self.children:
            child.package()

    def add(self, item):
        self.children.append(item)


p1 = Product("car")
p2 = Product("bike")

b = Box("garage")
b.add(p1)
b.add(p2)

b.package()
