<?php

class Audio
{
    public function init(): void
    {
        echo "audio initialized\n";
    }
}

class Video
{
    public function init(): void
    {
        echo "video initialized\n";
    }
}

class MediaFacade
{
    public function __construct(private Audio $audio, private Video $video)
    {
    }
    public function start()
    {
        $this->audio->init();
        $this->video->init();
    }
}

$audio = new Audio();
$video = new Video();
$media = new MediaFacade($audio, $video);
$media->start();

