interface EUSocket {
    public String connect();
}

class TV implements EUSocket {
    @Override
    public String connect() {
        return "tv connected to eu socket";
    }
}

// Adaptee
class Razor {
    public String plug() {
        return "Adding UK adapter";
    }
}

class RazorWithAdapter implements EUSocket {
    private Razor razor;

    public RazorWithAdapter(Razor razor) {
        this.razor = razor;
    }

    @Override
    public String connect() {
        return this.razor.plug() + " and razor connected to eu socket";
    }
}

public class Main {
    public static void main(String []args) {
        Razor r = new Razor();
        RazorWithAdapter ra = new RazorWithAdapter(r);
        System.out.println(ra.connect());
    }
}
