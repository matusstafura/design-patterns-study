interface Shipping {
    int cost();
    String description();
}

class Standard implements Shipping {
    @Override
    public int cost() {
        return 2;
    }

    @Override
    public String description() {
        return "Standard shipping";
    }
}

abstract class ShippingDecorator implements Shipping {
    protected Shipping shipping;

    public ShippingDecorator (Shipping shipping) {
        this.shipping = shipping;
    }

    @Override
    public int cost() {
        return this.shipping.cost();
    }

    @Override
    public String description() {
        return this.shipping.description();
    }
}

class ShippingWithFee extends ShippingDecorator {
    public ShippingWithFee(Shipping shipping) {
        super(shipping);
    }

    @Override
    public int cost() {
        return this.shipping.cost() + 1;
    }

    @Override
    public String description() {
        return this.shipping.description() + " with fee";
    }
}



public class Main {
    public static void main(String[] args) {
        Standard standard = new Standard();
        ShippingWithFee shippingWithFee = new ShippingWithFee(standard);
        System.out.println(shippingWithFee.description() + " " + shippingWithFee.cost());
    }
}

