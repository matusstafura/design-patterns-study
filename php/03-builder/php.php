<?php

class Building
{
    public function __construct(
        private string $doors,
        private bool $windows,
        private int $floors
    ) {
    }

    public function describe()
    {
        echo "it has doors: {$this->doors} and windows: {$this->windows} and floors: {$this->floors}";
    }
}

class BuildingBuilder
{
    private $doors = "entrance";
    private $windows = false;
    private $floors = 0;

    public function setDoors(string $doors)
    {
        $this->doors = $doors;
        return $this;
    }
    public function setWindows(bool $windows)
    {
        $this->windows = $windows;
        return $this;
    }
    public function setFloors(int $floors)
    {
        $this->floors = $floors;
        return $this;
    }
    public function build(): Building
    {
        return new Building($this->doors, $this->windows, $this->floors);
    }
}

class Director
{
    public function __construct(private BuildingBuilder $b)
    {
    }

    public function HouseBuilder()
    {
        $this->b
            ->setDoors("both")
            ->setWindows(true)
            ->setFloors(2);

        return $this->b->build();
    }
}
$b = new BuildingBuilder();
$d = new Director($b);
$house = $d->HouseBuilder();
$house->describe();

