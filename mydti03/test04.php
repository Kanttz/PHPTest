<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculate Number</h1>
    <hr>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        ป้อนตัวเลขตัวที่ 1 : <input type="number" name="num1" id=""><br><br>
        ป้อนตัวเลขตัวที่ 2 : <input type="number" name="num2" id=""><br><br>
        <!--------------------------------------------------------------------------------------------->
        เลือกการคำนวณ :
        <input type="checkbox" name="opt1" id=""> + บวก
        <input type="checkbox" name="opt2" id=""> - ลบ
        <input type="checkbox" name="opt3" id=""> x คูณ
        <input type="checkbox" name="opt4" id=""> ÷ หาร
        <input type="checkbox" name="opt5" id=""> ** ยกกำลัง
        <br><br>
        <!--------------------------------------------------------------------------------------------->
        <input type="submit" value="คำนวณ">
        <input type="reset" value="ยกเลิก">
    </form>
    <hr>
    <?php
    function calPlus($num1, $num2)
    {
        $calP = $num1 + $num2;
        echo  $num1 . ' + ' . $num2 . ' = ' . $calP . '<br><hr>';
    }
    function calMinus($num1, $num2)
    {
        $calMi = $num1 - $num2;
        echo $num1 . ' - ' . $num2 . ' = ' . $calMi . '<br><hr>';
    }
    function calMultiple($num1, $num2)
    {
        $calMu = $num1 * $num2;
        echo $num1 . ' x ' . $num2 . ' = ' . $calMu . '<br><hr>';
    }
    function calDivide($num1, $num2)
    {
        $calDi = $num1 / $num2;
        echo $num1 . ' ÷ ' . $num2 . ' = ' . $calDi . '<br><hr>';
    }
    function calPower($num1, $num2)
    {
        $calPo = $num1 ** $num2;
        echo $num1 . ' ** ' . $num2 . ' = ' . $calPo . '<br><hr>';
    }
    //-----------------------------------------------------------------
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //-----------------------------------------------------------------
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        //-----------------------------------------------------------------
        if (isset($_POST["opt1"])) {
            calPlus($num1, $num2);
        }
        if (isset($_POST["opt2"])) {
            calMinus($num1, $num2);
        }
        if (isset($_POST["opt3"])) {
            calMultiple($num1, $num2);
        }
        if (isset($_POST["opt4"])) {
            calDivide($num1, $num2);
        }
        if (isset($_POST["opt5"])) {
            calPower($num1, $num2);
        }
    }
    ?>
</body>

</html>