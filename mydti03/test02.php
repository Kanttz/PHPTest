<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculate Number</h1>
    <hr>
    <form action="test02.php" method="post">
        <input type="number" name="num1" id="num1" placeholder="Enter Number">
        <input type="number" name="num2" id="num2" placeholder="Enter Number">
        <br>
        <br>
        <input type="submit" name="opt1" value="+">
        <input type="submit" name="opt2" value="-">
        <input type="submit" name="opt3" value="x">
        <input type="submit" name="opt4" value="÷">
        <input type="submit" name="opt5" value="**">
    </form>
    < <hr>
        <?php
        if (isset($_POST['opt1'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $num1 + $num2;
            echo "ผลบวกของ {$num1} + {$num2} = {$result}";
        }
        if (isset($_POST['opt2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $num1 - $num2;
            echo "ผลลบของ {$num1} - {$num2} = {$result}";
        }
        if (isset($_POST['opt3'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $num1 * $num2;
            echo "ผลคูณของ {$num1} x {$num2} = {$result}";
        }
        if (isset($_POST['opt4'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $num1 / $num2;
            echo "ผลหารของ {$num1} ÷ {$num2} = {$result}";
        }
        if (isset($_POST['opt5'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $result = $num1 ** $num2;
            echo "ผลยกกำลังของ {$num1} ** {$num2} = {$result}";
        }

        ?>
</body>

</html>