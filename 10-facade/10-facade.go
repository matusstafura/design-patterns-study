package main

import "fmt"

type Audio struct{}

func (a Audio) init() string {
	return "audio on"
}

type Video struct{}

func (v Video) init() string {
	return "video on"
}

type Facade struct {
	audio Audio
	video Video
}

func (f Facade) facade() {
	fmt.Println(f.audio.init())
	fmt.Println(f.video.init())
}

func main() {
	a := Audio{}
	v := Video{}
	f := Facade{audio: a, video: v}

	f.facade()
}
