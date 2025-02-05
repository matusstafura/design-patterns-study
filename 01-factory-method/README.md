# Factory Method Pattern

Type: Creational

- defines a method that should be used for creating objects instead of direct constructor call (new)

Consists of:

- Factory Interface: declares the factory method, which returns an object of type Product
- Concrete Factory: overrides the factory method to return an instance of a ConcreteProduct

- Product Interface: defines the interface of objects the factory method creates
- Concrete Product: implements the Product interface

