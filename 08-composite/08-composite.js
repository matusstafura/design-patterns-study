class Item
{
    show() {
        throw new Error("not implemented");
    }
}

class Product extends Item {
    constructor(name) {
        super();
        this.name = name;
    }

    show() {
        return " - " + this.name;
    }
}

class Box extends Item {
    constructor(name) {
        super();
        this.name = name;
        this.children = [];
    }

    show() {
        console.log(this.name);
        this.children.forEach(c => console.log(c.show()));
    }

    add(item) {
        this.children.push(item);
    }
}

const p1 = new Product("phone");
const p2 = new Product("phone holder");
const p3 = new Product("charger");

const box = new Box("phone premium");

box.add(p1);
box.add(p2);
box.add(p3);

box.show();
