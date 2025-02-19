class Computer  {
    constructor(ram, cpu, ssd) {
        this.ram = ram,
        this.cpu = cpu,
        this.ssd = ssd
    }

    stats() {
        console.log('ram: ', this.ram, 'cpu: ', this.cpu, 'ssd: ', this.ssd)
    }
}

class ComputerBuilder {
    constructor() {
        this.ram = ""
        this.cpu = ""
        this.ssd = ""
    }

    setRam(ram) {
        this.ram = ram;
        return this;
    }

    setCpu(cpu) {
        this.cpu = cpu;
        return this;
    }

    setSsd(ssd) {
        this.ssd = ssd;
        return this;
    }

    build() {
        return new Computer(this.ram, this.cpu, this.ssd);
    }
}

class Director {
    constructor(Builder) {
        this.builder = Builder
    }

    homePc() {
        return this.builder
            .setRam("24GB")
            .setCpu("5.1GHz")
            .setSsd("1TB")
            .build()
    }
}

const builder = new ComputerBuilder();
const director = new Director(builder);

homePc = director.homePc();
homePc.stats();
