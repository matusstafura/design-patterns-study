import java.util.HashMap;
import java.util.Map;

interface Character {
    String render();
}

class ConcreteCharacter implements Character {
    private final String ch;

    public ConcreteCharacter(String ch) {
        this.ch = ch;
    }

    @Override
    public String render() {
        return this.ch;
    }
}

class CharacterFactory {
    private final Map<String, ConcreteCharacter> chars = new HashMap<>();

    public Character getChar(String ch) {
        if (!this.chars.containsKey(ch)) {
            this.chars.put(ch, new ConcreteCharacter(ch));
        }

        return this.chars.get(ch);
    }

    public int getCacheSize() {
        return this.chars.size();
    }
}

public class Main {
    public static void main(String[] args) {
        CharacterFactory factory = new CharacterFactory();

        Character c1 = factory.getChar("A");
        Character c2 = factory.getChar("B");
        Character c3 = factory.getChar("A");

        System.out.println(c1.render()); // A
        System.out.println(c2.render()); // B
        System.out.println(c3.render()); // A

        System.out.println("Total unique chars in memory: " + factory.getCacheSize()); // 2
    }
}

