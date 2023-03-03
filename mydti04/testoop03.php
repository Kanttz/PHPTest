<?php
class TestOOP03
{
    public $data1;

    public function __construct()
    {
        echo "Hi....<br/>";
    }
    public function met1()
    {
        echo 111;
    }
}

class TestOOP04 extends TestOOP03
{
    public $info1;
    public $info2;

    public function __construct()
    {
        echo "Hey....<br/>";
    }

    public function metA()
    {
        echo "AAA";
    }
    public function met1()
    {
        echo "222";
    }
}

$ob1 = new TestOOP03();
$ob2 = new TestOOP04();

$ob2->met1();
