interface Product {
    String process(String title);
}

class Book implements Product {
    public String process(String title) {
        return title + " has been picked from the shelf.";
    }
}

class Ebook implements Product {
    public String process(String title) {
        return "A copy of a digital ebook " + title + " has been made.";
    }
}

abstract class Shipping {
    protected Product product;

    public Shipping(Product product) {
        this.product = product;
    }

    public abstract String ship(String message); 
}

class Digital extends Shipping {
    public Digital(Product product) {
        super(product);
    }

    @Override
    public String ship(String message) {
        return this.product.process(message) + " It has been shipped digitally.";
    }
}

class Physical extends Shipping {
    public Physical(Product product) {
        super(product);
    }

    @Override
    public String ship(String message) {
        return this.product.process(message) + " It has been shipped physically.";
    }
}

public class Main {
    public static void main(String[] args) {
        Product book = new Book();
        Shipping physical = new Physical(book);
        System.out.println(physical.ship("Alice in Wonderland"));

        Product ebook = new Ebook();
        Shipping digital = new Digital(ebook);
        System.out.println(digital.ship("Forrest Gump"));
    }
}
