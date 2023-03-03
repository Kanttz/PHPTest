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
    <form action="car_cal_show.php" method="post">
        <div style="text-align: center;">
            <img src="./images/car.jpg" alt="" width="50%">
            <hr style width="70px">
            <h2>ข้อมูลการคำนวณผ่อนรถ</h2>
            <?php
            if (!empty($_SESSION["err_msg"])) {
                echo "<strong style=\"color:#ff0000\">" . $_SESSION["err_msg"] . "</strong>";
                echo "<br><br>";
            }
            ?>
            ราคารถ : <input type="text" name="car_price" id=""> บาท
            <br><br>
            ดาวน์รถ :
            <input type="radio" name="car_down" value="15" id="" checked> 15%
            <input type="radio" name="car_down" value="20" id=""> 20%
            <input type="radio" name="car_down" value="30" id=""> 30%
            <input type="radio" name="car_down" value="40" id=""> 40% ของราคารถ
            <br><br>

            ดอกเบี้ย : <input type="text" name="car_dong" id=""> % ต่อปี
            <br><br>
            จำนวนปีที่ผ่อน :
            <select name="car_year" id="">
                <option value="1">1 ปี</option>
                <option value="2">2 ปี</option>
                <option value="3">3 ปี</option>
                <option value="4">4 ปี</option>
                <option value="5">5 ปี</option>
                <option value="6">6 ปี</option>
                <option value="7">7 ปี</option>
            </select>
            <hr style width="70px">
            <input type="submit" value="คำนวณ">
            <input type="reset" value="ยกเลิก">
        </div>
    </form>



</body>

</html>