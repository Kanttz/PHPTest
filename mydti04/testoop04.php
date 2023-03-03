<?php

class TestA
{
    public $a = 10;
    private $b = 20;

    public function getB()
    {
        return $this->b;
    }

    public function setB($b)
    {
        $this->b = $b;
    }
    protected $c = 30;

    public function metA()
    {
        $this->a = 15;
        $this->b = 25;
        $this->c = 35;
    }
}
class TestB extends TestA
{
    public function metB()
    {
        parent::$a = 15;
        // parent::$b = 30;
        parent::$c = 30;
    }
}
class TestC
{
    public function metC()
    {
        $ob2 = new TestA();
        $ob3 = new TestB();
    }
}

$ob1 = new TestA();
$ob1->a = 15;
// $ob1->b = 25;
// $ob1->c = 35;
