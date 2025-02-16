// 1. Abstract Factory Interface
interface ShippingFactory {
    ShippingCreator createShippingMethod();
    StockUpdater createStockUpdater();
}

// 2. Concrete Factories
class PhysicalProduct implements ShippingFactory {
    public ShippingCreator createShippingMethod() {
        return new PhysicalProductShipping();
    }

    public StockUpdater createStockUpdater() {
        return new PhysicalProductStock();
    }
}

class DigitalProduct implements ShippingFactory {
    public ShippingCreator createShippingMethod() {
        return new DigitalProductShipping();
    }

    public StockUpdater createStockUpdater() {
        return new DigitalProductStock();
    }
}

// 3. Abstract Product Interfaces
interface ShippingCreator {
    void calculateCost();
}

interface StockUpdater {
    void updateStock();
}

// 4. Concrete Products
class PhysicalProductShipping implements ShippingCreator {
    public void calculateCost() {
        System.out.println("Physical product shipping cost: 9 EUR");
    }
}

class PhysicalProductStock implements StockUpdater {
    public void updateStock() {
        System.out.println("Stock quantity for the physical product decreased.");
    }
}

class DigitalProductShipping implements ShippingCreator {
    public void calculateCost() {
        System.out.println("Digital product shipping is free.");
    }
}

class DigitalProductStock implements StockUpdater {
    public void updateStock() {
        System.out.println("No stock change needed, product is digital.");
    }
}

// 5. Client Code
class ShippingService {
    private ShippingFactory shippingFactory;

    public ShippingService(ShippingFactory shippingFactory) {
        this.shippingFactory = shippingFactory;
    }

    public void processOrder() {
        ShippingCreator shippingCreator = shippingFactory.createShippingMethod();
        StockUpdater stockUpdater = shippingFactory.createStockUpdater();

        shippingCreator.calculateCost();
        stockUpdater.updateStock();
    }
}

// 6. Main Method to Run the Example
public class Main {
    public static void main(String[] args) {
        System.out.println("Processing a physical product order:");
        ShippingService physicalOrder = new ShippingService(new PhysicalProduct());
        physicalOrder.processOrder();

        System.out.println("\nProcessing a digital product order:");
        ShippingService digitalOrder = new ShippingService(new DigitalProduct());
        digitalOrder.processOrder();
    }
}

