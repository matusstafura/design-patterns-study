class Computer:
    def __init__(self, ram, cpu, ssd):
        self.ram = ram
        self.cpu = cpu
        self.ssd = ssd

    def stats(self):
        return f"ram is: {self.ram}GB, cpu is: {self.cpu}, ssd is: {self.ssd}."

class ComputerBuilder:
    def __init__(self):
        self.ram = None
        self.cpu = None
        self.ssd = None

    def set_ram(self, ram):
        self.ram = ram
        return self

    def set_cpu(self, cpu):
        self.cpu = cpu
        return self

    def set_ssd(self, ssd):
        self.ssd = ssd
        return self

    def build(self):
        return Computer(self.ram, self.cpu, self.ssd)

class Director:
    def __init__(self, builder: ComputerBuilder):
        self.builder = builder

    def home_pc(self):
        return self.builder.set_ssd("512").set_cpu("3.14").set_ram("8").build()
        
def main():
    builder = ComputerBuilder()
    director = Director(builder)
    home_pc = director.home_pc()
    print(home_pc.stats())

if __name__ == "__main__":
    main()

