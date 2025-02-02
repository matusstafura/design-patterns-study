class Network {
    login() {
        throw new Error("not implemented")
    }
}
class Bluesky extends Network {
    login() {
        console.log("logged to bluesky")
    }
}

class Reddit extends Network {
    login() {
        console.log("logged to reddit")
    }
}

class SocialMediaFactory {
    static send(platform) {
        if (platform == "bs") {
            return new Bluesky
        } else if (platform == "rd") {
            return new Reddit
        } else {
            throw new Error()
        }
    }
}

const platform = SocialMediaFactory.send("bs")
platform.login()



