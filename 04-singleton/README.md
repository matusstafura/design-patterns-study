## Singleton

### Definition

Ensure a class has only one instance and provide a global point of access to it.

- to ensure that a class has only a single instance
- to provide a global point of access to the object

! Do not use Singleton pattern

- hard to test code that uses Singleton
- acts like a global variable, hard to track dependencies
- violates Single Responsibility Principle
- can lead to race conditions
- controls its own instantiation, it cannot be easily extended or replaced

Alternatives:

- Dependency Injection to create a single instance of a class
- Service Locator pattern
- Factory Pattern
