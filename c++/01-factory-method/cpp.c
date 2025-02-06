#include <iostream>
using namespace std;

class Social {
    public:
        virtual void login() = 0;
        virtual ~Social() {}
};

class Bluesky: public Social {
    public:
        void login() override {
            std::cout << "log in bluesky" << "\n";
        }
};

class Reddit: public Social {
    public:
        void login() override {
            std::cout << "log in reddit" << "\n";
        }
};

class SocialFactory {
    public:
        virtual Social* create() = 0;
        virtual ~SocialFactory() {}
};

class BlueskyFactory: public SocialFactory {
    public:
        Social* create() override {
            return new Bluesky();
        }
};

class RedditFactory: public SocialFactory {
    public:
        Social* create() override {
            return new Reddit();
        }
};

Social* clientCode(string platform) {
    SocialFactory* factory = nullptr;
    if (platform == "bs") {
        factory = new BlueskyFactory();
    } else if (platform == "rd") {
        factory = new RedditFactory();
    }

    Social* social = nullptr;
    if (factory) {
        social = factory->create();
        delete factory;
    }
    return social;
}

int main() {
    
    Social* social = clientCode("bs");
    social->login();
    return 0;
}
