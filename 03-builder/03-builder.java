class Computer {
    private String ram;
    private String cpu;
    private String ssd;
   
    public Computer(String ram, String cpu, String ssd) {
        this.ram = ram;
        this.cpu = cpu;
        this.ssd = ssd;
    }

    public void stats() {
        System.out.printf("ram: %s. cpu: %s. ssd: %s.", this.ram,  this.cpu, this.ssd);
    }
}

class ComputerBuilder {
    private String ram;
    private String cpu;
    private String ssd;

    public ComputerBuilder setRam(String ram) {
        this.ram = ram;
        return this;
    }

    public ComputerBuilder setCpu(String cpu) {
        this.cpu = cpu;
        return this;
    }

    public ComputerBuilder setSsd(String ssd) {
        this.ssd = ssd;
        return this;
    }

    public Computer build() {
        return new Computer(this.ram, this.cpu, this.ssd);
    }
}

class Director {
    private ComputerBuilder builder;
    
    public Director(ComputerBuilder builder) {
        this.builder = builder;
    }

    public Computer homePC() {
        return this.builder
            .setRam("32")
            .setCpu("5.1GHz")
            .setSsd("512GB")
            .build();
    }
}

public class Main {
    public static void main(String[] args) {
        ComputerBuilder builder = new ComputerBuilder();
        Director director = new Director(builder);
        Computer homePC = director.homePC();
        homePC.stats(); // Output: ram: 32. cpu: 5.1GHz. ssd: 512GB.
    }
}
