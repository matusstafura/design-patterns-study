<?php

interface Texture
{
    public function render(int $x, int $y);
}

class Tree implements Texture
{
    public function __construct(private string $color)
    {
    }

    public function render(int $x, int $y)
    {
        echo "Tree with color {$this->color} at position ({$x}, {$y})\n";
    }
}

class Forest
{
    protected $trees = [];

    public function getTree(string $color): Texture
    {
        if (!isset($this->trees[$color])) {
            $this->trees[$color] = new Tree($color);
        }

        return $this->trees[$color];
    }

    public function plantTree(string $color, int $x, int $y)
    {
        $tree = $this->getTree($color);
        $tree->render($x, $y);
    }

    public function all()
    {
        return count($this->trees);
    }
}

$forest = new Forest();
$forest->plantTree("green", 10, 20);
$forest->plantTree("green", 15, 25);
$forest->plantTree("dark green", 5, 10);
$forest->plantTree("green", 10, 30);

"total: " . $forest->all() . " trees planted";

