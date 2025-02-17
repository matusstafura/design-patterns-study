<?php

class PC
{
    public function __construct(
        private $ram = null,
        private $ssd = null,
        private $processor = null
    ) {
    }
    public function specs()
    {
        echo "==================\n";
        echo "ram: $this->ram\n";
        echo "ssd: $this->ssd\n";
        echo "processor: $this->processor\n";
        echo "==================\n";
    }
}

class PCBuilder
{
    private $ram = null;
    private $ssd = null;
    private $processor = null;

    public function setRam($ram)
    {
        $this->ram = $ram;
        return $this;
    }

    public function setSSD($ssd)
    {
        $this->ssd = $ssd;
        return $this;
    }

    public function setProcessor($processor)
    {
        $this->processor = $processor;
        return $this;
    }

    public function build()
    {
        return new PC($this->ram, $this->ssd, $this->processor);
    }
}

class PCDirector
{
    public function __construct(private PCBuilder $builder)
    {
    }

    public function homePC()
    {
        return $this->builder
            ->setRam(32)
            ->setSSD(512)
            ->setProcessor("3.4")
            ->build();
    }

    public function garageServer()
    {
        return $this->builder
            ->setRam(16)
            ->setSSD(64)
            ->setProcessor(1.7)
            ->build();
    }
}

$b = new PCBuilder();
$d = new PCDirector($b);
$pc = $d->homePC();
$pc->specs();
$pc = $d->garageServer();
$pc->specs();

