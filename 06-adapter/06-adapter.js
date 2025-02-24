class Notification {
    send() {
        throw new Error("not implemented");
    }
}

class Letter extends Notification {
    constructor(message) {
        super();
        this.message = message;
    }
    send() {
        return "sending letter message: " + this.message;
    }
}

// Adaptee (Incompatible Class)
class Uppercase {
    constructor(string) {
        this.string = string;
    }

    decode() {
        return this.string.toUpperCase();
    }
}

// Adapter (Converts Uppercase to Notification)
class UppercaseMessage extends Notification {
    constructor(uppercase) {
        super();
        this.uppercase = uppercase;
    }

    send() {
        return `sending message: ${this.uppercase.decode()}`;
    }
}

// Client Code
const letter = new Letter("hi");
console.log(letter.send());  // "sending letter message: hi"

const message = new Uppercase("hello");
const adaptedMessage = new UppercaseMessage(message);

console.log(adaptedMessage.send());  // "sending message: HELLO"
