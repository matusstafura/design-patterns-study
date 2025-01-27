from abc import ABC, abstractmethod

class Social(ABC):
    @abstractmethod
    def login(self):
        pass

class Bluesky(Social):
    def login(self):
        print("logged to bluesky")

class Reddit(Social):
    def login(self):
        print("logged to reddit")

def SocialFactory(platform):
    if platform == "bs":
        return Bluesky()

def main():
    try:
        social = SocialFactory("bs")
        social.login()
    except ValueError as e:
        print(e)
 
if __name__ == "__main__":
    main()

