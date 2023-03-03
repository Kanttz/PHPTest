<?php

function funcA()
{
    echo "Hi......";
}

function funcB($x, $score)
{
    $result = $score + 10;
    echo "<br>{$x} ได้ผลคะแนน {$result}";
}



function funcC()
{
    echo '<br>Wow Woo Wee';
    return 'Welcome to ';
}

function funcD($x, $y)
{
    return $x ** $y;
}

funcA();
funcA();
funcB("Kantz", 26);
echo '<br>' . funcC() . 'THAILAND' . '<br>';
$x = funcD(10, 2);
echo "10 ยกกำลัง 2 คือ {$x}<br>";
echo "10 ยกกำลัง 2 คือ " . $x;
