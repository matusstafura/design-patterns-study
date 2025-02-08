from abc import ABC, abstractmethod

# Product Interface
class Social(ABC):
    @abstractmethod
    def login(self):
        pass

# Concrete Product
class Bluesky(Social):
    def login(self):
        print("logged to bluesky")

# Concrete Product
class Reddit(Social):
    def login(self):
        print("logged to reddit")

# Factory Interface
class SocialFactory(ABC):
    @abstractmethod
    def create(self):
        pass

# Concrete Factory
class BlueskyFactory(SocialFactory):
    def create(self):
        return Bluesky()

# Concrete Factory
class RedditFactory(SocialFactory):
    def create(self):
        return Reddit()

# Client Code
def main():
    bluesky = BlueskyFactory().create()
    bluesky.login()

    reddit = RedditFactory().create()
    reddit.login()
 
if __name__ == "__main__":
    main()

