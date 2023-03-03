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

                //รูปใน DB จะเก็บชื่อรูป ส่วนตัวรูปจะอัปโหลดไว้ที่ Server ภายใต้ไดเรกทอรี่ images/students
                //1. generate ชื่อรูปที่อัปโหลดมาเป็นชื่อใหม่
                //1.1 เอานามสกุลของรูปที่อัปโหลดมาเก็บในตัวแปร
                $temp = explode(".", $_FILES["stuImage"]["name"]);
                $extentionFile = end($temp);
                //1.2 generate ชื่อใหม่ แล้วเอาไปรวมกับนามสกุลเก็บในตัวแปร
                $newFileName = "sau_" . md5(uniqid()) . "." . $extentionFile;
                //2. เอาชื่อรูปใหม่กำหนดให้กับ data ที่สร้างไว้ที่ Student
                $student->stuImage = $newFileName;
                //3. เอารูปที่ส่งมาไปใส่ที่ Server ในไดเรกทอรี่ที่กำหนดไว้ พร้อมกับชื่อไฟล์ใหม่ที่เปลี่ยน
                move_uploaded_file($_FILES["stuImage"]["tmp_name"], "./images/students/" . $newFileName);


                //เรียกใช้คำสั่งบันทึกข้อมูลลง Table (student_tb) ใน DB (dti_info_db)
                if ($student->insertStudent()) {
                        echo "<h3>บันทึกเรียบร้อยแล้ว....^_^</h3>";
                } else {
                        echo "<h3>บันทึกไม่สำเร็จ กรุณาลองใหม่หรือติดต่อ IT .... T_T</h3>";
                }

                //ค้างไว้ 2 วินาที แล้วให้ redirect ไปที่หน้า student_showall.php
                header("Refresh:2; url=./student_showall.php");
        }

        ?>


</body>

</html>