<?php

class Car
{
    private $color;
    private $brand;
    private $price;

    public function __construct()
    {
        $this->color = "Blue";
        $this->brand = "BMW";
        $this->price = 10000000;
    }

    public function changeColor($newColor)
    {
        $this->color = $newColor;
    }

    public function displayColor()
    {
        echo "The car's color: " . $this->color;
    }
}

$car1 = new Car();
$car2 = new Car();

echo "<b>First Car</b><br>";
$car1->displayColor();
echo "<br>Changing the color of the first car<br>";
$car1->changeColor("Red");
$car1->displayColor();

echo "<br><b>Second Car</b><br>";
$car2->changeColor("Green");
$car2->displayColor();

?>
