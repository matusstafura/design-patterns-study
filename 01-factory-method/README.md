## Factory Method

### Definition

Define an interface for creating an object, but let subclasses decide which class to instantiate. Factory method lets a class defer instantiation to subclasses.

- to deal with the problem of creating objects without having to specify their exact classes
- instead of calling a constructor you invoke a factory method to create an object

### Structure

- Product - declares the interface of objects 
- Concrete Product - implementations of the Product interface
- Creator - declares the factory method which returns an object of type Product
- Concrete Creator - implements the factory method to return an object of type Concrete Product
