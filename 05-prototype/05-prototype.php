<?php

interface ComputerPrototype
{
    public function clone(): ComputerPrototype;
    public function showDetails(): void;
}

class GamingPC implements ComputerPrototype
{
    public function __construct(private string $gpu, private int $ram)
    {
    }

    public function clone(): ComputerPrototype
    {
        return new GamingPC($this->gpu, $this->ram);
    }

    public function showDetails(): void
    {
        echo "Gaming PC - GPU: {$this->gpu}, RAM: {$this->ram}GB\n";
    }
}

$gamingPC = new GamingPC("RTX 4090", 32);
$gamingPCclone = $gamingPC->clone();

var_dump($gamingPC, $gamingPCclone);

/* object(GamingPC)#2276 (2) { */
/*   ["gpu":"GamingPC":private]=> */
/*   string(8) "RTX 4090" */
/*   ["ram":"GamingPC":private]=> */
/*   int(32) */
/* } */
/* object(GamingPC)#2275 (2) { */
/*   ["gpu":"GamingPC":private]=> */
/*   string(8) "RTX 4090" */
/*   ["ram":"GamingPC":private]=> */
/*   int(32) */
/* } */
