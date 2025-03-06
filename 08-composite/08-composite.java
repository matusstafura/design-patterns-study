import java.util.ArrayList;

interface Item {
    public void show();
}

class Product implements Item {
    private String name;

    public Product(String name) {
        this.name = name;
    }

    @Override
    public void show() {
        System.out.println(" - " + this.name);
    }
}

class Package implements Item {
    private String name;
    private ArrayList<Item> children;

    public Package(String name) {
        this.name = name;
        children = new ArrayList<>();
    }

    @Override
    public void show() {
        System.out.println("+ " + name);
        for (Item child: children) {
            child.show();
        }
    }

    public void add(Item item) {
        this.children.add(item);
    }
}

public class Main {
    public static void main(String []args) {
        Product guitar = new Product("Stratocaster 1968");
        Product strings = new Product("strings");
        Product guitarCase = new Product("case");

        Package premium = new Package("Fender Vintage Premium");
        premium.add(guitar);
        premium.add(strings);
        premium.add(guitarCase);

        premium.show();
    }
} 
