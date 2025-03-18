from abc import ABC, abstractmethod

# Step 1: Define the Component Interface
class Shipping(ABC):
    @abstractmethod
    def cost(self) -> float:
        pass

    @abstractmethod
    def description(self) -> str:
        pass

# Step 2: Create a Concrete Component
class Standard(Shipping):
    def cost(self) -> float:
        return 5.0  # Standard shipping cost

    def description(self) -> str:
        return "Standard shipping"

# Step 3: Create an Abstract Decorator
class ShippingDecorator(Shipping):
    def __init__(self, shipping: Shipping):
        self.shipping = shipping

    def cost(self) -> float:
        return self.shipping.cost()

    def description(self) -> str:
        return self.shipping.description()

# Step 4: Create Concrete Decorators
class CashOnDelivery(ShippingDecorator):
    def cost(self) -> float:
        return super().cost() + 2.0  # Additional fee for COD

    def description(self) -> str:
        return super().description() + " with COD fee"

# Step 5: Use the Decorator
s = Standard()
cod = CashOnDelivery(s)

print(cod.description(), "costs $", cod.cost())
