<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>

<body>
        <h1>ผลลัพธ์แก้ไขข้อมูลนักเรียน DTI</h1>
        <hr>
        <?php

        require_once "./ConnectDatabase.php";
        require_once "./Student.php";

        //สร้าง object ของคลาส ConnnectDatabase
        $connectDatabase = new ConnnectDatabase();
        //สร้าง object ของคลาส Student
        $student = new Student($connectDatabase->getConnectDatabase());

        //เอาข้อมูลที่ส่งมากำหนดให้กับ data ที่สร้างไว้ที่ Student
        $student->stuId = $_GET['stuId'];

        //เรียกใช้คำสั่งบันทึกข้อมูลลง Table (student_tb) ใน DB (dti_info_db)
        if ($student->deleteStudentByStuId()) {
                echo "<h3>ลบ เรียบร้อยแล้ว....^_^</h3>";
        } else {
                echo "<h3>ลบ ไม่สำเร็จ กรุณาลองใหม่หรือติดต่อ IT .... T_T</h3>";
        }

        //ค้างไว้ 2 วินาที แล้วให้ redirect ไปที่หน้า student_showall.php
        header("Refresh:2; url=./student_showall.php");
        ?>


</body>

</html>