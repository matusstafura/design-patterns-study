class Audio {
    public String init() {
        return "audio on";
    }
}

class Video {
    public String init() {
        return "video on";
    }
}

class AudioVideoFacade {
    private Audio audio;

    private Video video;

    public AudioVideoFacade(Audio audio, Video video) {
        this.audio = audio;
        this.video = video;
    }

    public void play() {
        System.out.println(this.audio.init());
        System.out.println(this.video.init());
    }
}

public class Main {
    public static void main(String []args) {
        Audio audio = new Audio();
        Video video = new Video();
        AudioVideoFacade f = new AudioVideoFacade(audio, video);
        f.play();
    }
}
