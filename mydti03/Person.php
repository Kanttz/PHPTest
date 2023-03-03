<?php
class Person
{

    public $fname;
    public $age;
    public $color = " Red ";


    public function speak()
    {
        echo "Wow .......... ";
    }
    public function singASong($s_name)
    {
        echo "ร้องเพลง {$s_name}";
    }
}


$dtiA = new Person();
$dtiB = new Person();
$dtiC = new Person();

$dtiA->speak();
$dtiA->speak();
$dtiA->speak();
$dtiB->speak();
$dtiB->singASong("");
$dtiB->singASong("ร้องได้ดี๊");
$dtiA->color = "Blue";
echo $dtiA->color;
$dtiA->fname = 'Kantz';
echo $dtiB->color;
$dtiB->fname = 'Kantza_007';
echo $dtiB->fname;
