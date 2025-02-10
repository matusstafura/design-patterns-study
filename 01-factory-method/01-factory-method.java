// Product Interface: Defines a common contract for all social media platforms
interface Network {
    void login();
}

// Concrete Products: Implement the Network interface
class Bluesky implements Network {
    public void login() {
        System.out.println("logged to bluesky");
    }
}

class Reddit implements Network {
    public void login() {
        System.out.println("logged to reddit");
    }
}

// Factory Interface (Abstract Creator): Declares the Factory Method
abstract class Factory {
    // Factory Method: Subclasses must implement this to create specific Network objects
    abstract public Network createNetwork();

    // Uses the Factory Method to create an object and calls its method
    public void send() {
        Network network = createNetwork(); // Factory Method is called
        network.login(); // Calls login on the created object
    }
}

// Concrete Factories: Implement the Factory Method to return specific product instances
class BlueskyFactory extends Factory {
    public Network createNetwork() {
        return new Bluesky();
    }
}

class RedditFactory extends Factory {
    public Network createNetwork() {
        return new Reddit();
    }
}

// Client Code: Uses factories without knowing about concrete implementations
public class Main {
    public static void main(String[] args) {
        Factory blueskyFactory = new BlueskyFactory();
        blueskyFactory.send(); // Output: logged to bluesky

        Factory redditFactory = new RedditFactory();
        redditFactory.send(); // Output: logged to reddit
    }
}
