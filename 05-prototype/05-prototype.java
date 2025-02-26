interface Computer {
    public String showDetails();
    public Computer clone();
}

class GamingPC implements Computer {
    private String gpu;
    private String ram;

    public GamingPC(String gpu, String ram) {
        this.gpu = gpu;
        this.ram = ram;
    }

    @Override
    public String showDetails() {
        return "GPU: " + this.gpu + "RAM: " + this.ram;
    }

    @Override
    public Computer clone() {
        return new GamingPC(this.gpu, this.ram);
    }
}

public class Main {
    public static void main(String []args) {
        GamingPC gamingPC = new GamingPC("3.4GHz","16GB");
        System.out.println(gamingPC.showDetails());

        Computer gamingPCclone = gamingPC.clone();
        System.out.println(gamingPCclone.showDetails());

        System.out.println(gamingPC);
        System.out.println(gamingPCclone);
    }
}
