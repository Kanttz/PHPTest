<?php
class TestOb
{
    public $x;
    public function showHi()
    {
        echo "Hi...";
    }

    // abstract public function showHey();
}

class TestIFF extends TestOb
{
    public function showHey()
    {
        echo "5555";
    }
}


$nin = new TestIFF();
