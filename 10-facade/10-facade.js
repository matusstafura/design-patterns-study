class Audio {
    init() {
        return "audio on"
    }
}

class Video {
    init() {
        return "video on"
    }
}

class AudioVideoFacade {
    constructor(audio, video) {
        this.audio = audio
        this.video = video
    }

    play() {
        console.log(this.audio.init())
        console.log(this.video.init())
    }
}

const a = new Audio()
const v = new Video()
const f = new AudioVideoFacade(a, v)
f.play()
