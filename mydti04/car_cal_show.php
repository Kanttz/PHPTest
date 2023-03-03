<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="text-align: center;">
        <img src="./images/car.jpg" alt="" width="50%">
        <hr style width="70px">
        <h2>ข้อมูลการคำนวณผ่อนรถ</h2>
        <?php
        if (empty($_POST["car_price"])) {
            $_SESSION["err_msg"] = "ป้อนราคารถ";
            header("location: carInfo.php");
        } else if (empty($_POST["car_dong"])) {
            $_SESSION["err_msg"] = "ป้อนดอกเบี้ยรถด้วย...!";
            header("location: carInfo.php");
        }

        ?>
    </div>
</body>

</html>