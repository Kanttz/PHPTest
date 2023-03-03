<?php
//ต้องการสร้าง object ของ Animal ที่ไฟล์นี้
//require();
require_once('./Animal.php');
//include();
//include_once();

$sau1 = new Animal("Red", 10);
$sau2 = new Animal("Blue", 20);

$sau1->run(20);