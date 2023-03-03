<?php
class Animal
{
    public $color;
    public $leg;

    public function __construct($color, $leg)
    {
        $this->color = $color;
        $this->leg = $leg;
    }

    public function run($value)
    {
        echo "วิ่งได้ {$value} km/hr";
    }
}

$sau1 = new Animal("Red", 10);
$sau2 = new Animal("Blue", 20);

echo $sau1->color; // Red 
echo $sau2->color; // Blue

echo $sau1->leg; // 10
echo $sau2->leg; // 20

$sau1->run(10); // วิ่งได้ 10 km/hr
$sau2->run(20); // วิ่งได้ 20 km/hr
$sau1->run(30); // วิ่งได้ 30 km/hr
$sau2->run(40); // วิ่งได้ 40 km/hr

