class Letter:
    def __init__(self, char):
        self.char = char

    def render(self):
        print("This is a char:", self.char)

class CharFactory:
    def __init__(self):
        self.chars = {}

    def get_char(self, char):
        if char not in self.chars:
            self.chars[char] = Letter(char)
        return self.chars[char]

    def total_chars(self) -> int:
        return len(self.chars)

# Client code
c = CharFactory()
word = "mamma mia"
for l in word:
    if l.isalpha():
        char_obj = c.get_char(l)
        char_obj.render()

print("Total unique letters:", c.total_chars())
