<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>

<body>
        <h1>ผลลัพธ์เพิ่มข้อมูลนักเรียน DTI</h1>
        <hr>
        <?php
        if (!empty($_POST)) {
                require_once "./ConnectDatabase.php";
                require_once "./Student.php";

                //สร้าง object ของคลาส ConnnectDatabase
                $connectDatabase = new ConnnectDatabase();
                //สร้าง object ของคลาส Student
                $student = new Student($connectDatabase->getConnectDatabase());

                //เอาข้อมูลที่ส่งมากำหนดให้กับ data ที่สร้างไว้ที่ Student
                $student->stuId = $_POST['stuId'];
                $student->stuName = $_POST['stuName'];
                $student->stuMidterm = $_POST['stuMidterm'];
                $student->stuFinal = $_POST['stuFinal'];
                $student->stuGpa = $_POST['stuGpa'];
                $student->stuTotalScore = intval($_POST['stuMidterm']) + intval($_POST['stuFinal']);
                // รูปใน database จะเก็บชื่อรูป ส่วนตัวรูปจะเก็บไว้ใน server ใน images/student
                // 1. generate ชื่อรูปใหม่ โดยใช้ ชื่อรูปเดิม + วันเวลาที่อัพโหลด โดยจะต้องรู้ถึงสกุลของรูปนั้นๆก่อน
                // 1.1 เอานามสกุลของรูปที่อัพโหลดมาเก้บไว้ในตัวแปร
                $temp = explode(".", $_FILES['stuImage']['name']);
                $extentionFile = $ext = end($temp);
                // 1.2 generate ชื่อรูปใหม่ แล้วเอาไปรวมกับนามสกุลของรูปและเก็บไว้ในตัวแปร
                $newFileName = "sau_" . uniqid() . "." . $extentionFile;
                // 1.3 กำหนดชื่อรูปใหม่ให้กับ data ที่สร้างไว้ที่ Student
                $student->stuImage = $newFileName;
                // 2. เอารููปที่ส่งมาไปใส่ใน server ใน folder พร้อมกับชื่อไฟล์ใหม่ที่เปลี่ยนไปแล้ว
                move_uploaded_file($_FILES['stuImage']['tmp_name'], "./images/student/" . $newFileName);







                //เรียกใช้คำสั่งบันทึกข้อมูลลง Table (student_tb) ใน DB (dti_info_db)
                if ($student->insertStudent()) {
                        echo "บันทึกข้อมูลสำเร็จ";
                } else {
                        echo "บันทึกข้อมูลไม่สำเร็จ";
                }

                //ค้างไว้ 2 วินาที แล้วให้ redirect ไปที่หน้า student_showall.php
                header("Refresh:2; url=./student_showall.php");
        }

        ?>


</body>

</html>