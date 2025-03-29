class Character {
    constructor(character) {
        this.character = character;
    }

    render() {
        return this.character;
    }
}

class CharacterFactory {
    constructor() {
        this.chars = {};
    }

    getChar(char) {
        if (!this.chars[char]) {
            this.chars[char] = new Character(char);
        }
        return this.chars[char];
    }

    countChars() {
        return Object.keys(this.chars).length;
    }

    allChars() {
        return this.chars;
    }
}

// Client code
const cf = new CharacterFactory();
cf.getChar("a");
cf.getChar("b");
cf.getChar("a");

console.log(cf.allChars(), cf.countChars());
