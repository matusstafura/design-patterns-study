interface Network {
    public void login();
}

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

abstract class Factory {
    abstract public Network createNetwork();

    public void send() {
        Network network = createNetwork();
        network.login();
    }
}

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

public class Main {
    public static void main(String[] args) {
        Factory blueskyFactory = new BlueskyFactory();
        blueskyFactory.send();

        Factory redditFactory = new RedditFactory();
        redditFactory.send();
    }
}

