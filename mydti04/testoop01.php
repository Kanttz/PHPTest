<?php
class TestOOP01
{
    public $name;
    public $midterm = 0;
    public $final;
    public $gpa;

    public function __construct($name, $final, $gpa)
    {
        // echo "Welcome to SAU<br/>";
        $this->name = $name;
        $this->final = $final;
        $this->gpa = $gpa;
    }

    public function showHi()
    {
        echo "Hi......";
    }

    public function calGrade($quiz)
    {
        $total = $this->midterm + $this->final + $quiz;
        if ($this->midterm > 50) {
            return "A";
        } else {
            return "F";
        }
    }
}


$dtiA = new TestOOP01("mod", 20, 3.52);
$dtiB = new TestOOP01("jui", 35, 2.45);
$dtiC = new TestOOP01("wee", 40, 3.52);

$dtiA->name = "med";
echo "คะแนนปลายภาคของ dti A" . $$dtiA->final;

$dtiB->showHi();
