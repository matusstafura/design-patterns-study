// Step 1: Define the Component Interface
class Drink {
    constructor() {
        if (this.constructor === Drink) {
            throw new Error("Abstract class 'Drink' cannot be instantiated directly.");
        }
        if (this.cost === undefined || this.description === undefined) {
            throw new Error("Concrete classes must implement 'cost()' and 'description()' methods.");
        }
    }

    cost() {
        return 0;  // Default cost
    }

    description() {
        return "";  // Default description
    }
}

// Step 2: Create a Concrete Component
class Tea extends Drink {
    cost() {
        return 2;  // Base price of tea
    }

    description() {
        return "Regular tea";
    }
}

// Step 3: Create an Abstract Decorator
class DrinkDecorator extends Drink {
    constructor(drink) {
        super();
        this.drink = drink;
    }

    cost() {
        return this.drink.cost();
    }

    description() {
        return this.drink.description();
    }
}

// Step 4: Create Concrete Decorators
class TeaWithCookie extends DrinkDecorator {
    cost() {
        return super.cost() + 3;  // Adding cookie cost
    }

    description() {
        return super.description() + " with cookie";
    }
}

// Step 5: Use the Decorator
const t = new Tea();
const w = new TeaWithCookie(t);

console.log(w.description(), "costs", w.cost());
