// Product Interface
class Network {
    login() {
        throw new Error("not implemented");
    }
}

// Concrete Product
class Bluesky extends Network {
    login() {
        console.log("logged to bluesky");
    }
}

// Concrete Product
class Reddit extends Network {
    login() {
        console.log("logged to reddit");
    }
}

// Factory Interface (Abstract Creator)
class SocialMediaFactory {
    create() {
        throw new Error("not implemented");
    }
}

// Concrete Factories
class BlueskyFactory extends SocialMediaFactory {
    create() {
        return new Bluesky();
    }
}

// Concrete Factories
class RedditFactory extends SocialMediaFactory {
    create() {
        return new Reddit();
    }
}

// Client Code Wrapper
class SocialMediaManager {
    constructor(factory) {
        this.factory = factory;
    }

    login() {
        const network = this.factory.create(); // Factory Method creates the object
        network.login(); // Calls login method of the created object
    }
}

// Creating concrete factories
const blueskyFactory = new BlueskyFactory();
const redditFactory = new RedditFactory();

// Using the factories via the SocialMediaManager (Client Code)
const blueskyManager = new SocialMediaManager(blueskyFactory);
const redditManager = new SocialMediaManager(redditFactory);

blueskyManager.login(); // Output: logged to bluesky
redditManager.login(); // Output: logged to reddit
