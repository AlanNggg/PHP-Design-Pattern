<?php

interface Shape {
    public function draw();
}

class Rectangle implements Shape {

    public $position;

    public function __construct($pos) {
        $this->position = $pos;
    }

    public function draw() {
        echo 'Drawing a rectangle';
    }
}
class Position {
    public $x;
    public $y;
}

// draw not work in drawStuff nothing show
class MockShape implements Shape {
    public function draw() {
        return true;
    }
}

class ShapeFactory {
    public function create($type) {
        if ($type == "Rectangle") {
            // client just instanciate factory to get shape instance
            return new Rectangle(new Position());
        }
    }
}

function drawStuff(Shape $shape) {
    $shape->draw();
}

// if function/arguments change,
// all instances/functions call the instances propert have to change
$mock = new MockShape();

$factory = new ShapeFactory();
$rect = $factory->create("Rectangle");

drawStuff($rect);