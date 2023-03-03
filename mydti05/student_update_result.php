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
                $student->stuTotalScore = $student->stuMidterm + $student->stuFinal;

                //ตรวจสอบว่ามีการแก้ไขรูปไหม ถ้ามี ให้เอาไปเก็บไว้ใน folder ของรูป 
                //รูปใน DB จะเก็บชื่อรูป ส่วนตัวรูปจะอัปโหลดไว้ที่ Server ภายใต้ไดเรกทอรี่ images/student
                //1. generate ชื่อรูปที่อัปโหลดมาเป็นชื่อใหม่ แล้วเอาไปเก็บในตัวแปร $newFileName 
                //1.1 เอานามสกุลของรูปที่อัปโหลดมาเก็บในตัวแปร $extentionFile 
                //1.2 generate ชื่อใหม่ แล้วเอาไปรวมกับนามสกุลเก็บในตัวแปร $newFileName 
                //2. เอาชื่อรูปใหม่กำหนดให้กับ data ที่สร้างไว้ที่ Student 
                //3. เอารูปที่ส่งมาไปใส่ที่ Server ในไดเรกทอรี่ที่กำหนดไว้ พร้อมกับชื่อไฟล์ใหม่ที่เปลี่ยนไปแล้ว 

                if (!empty($_FILES["stuImage"]["name"])) {
                        $temp = explode(".", $_FILES["stuImage"]["name"]);
                        if (count($temp) == 2) {
                                $extentionFile = end($temp);
                                $newFileName = "sau_" . md5(uniqid()) . "." . $extentionFile;
                                $student->stuImage = $newFileName;
                                $imageUploaded = move_uploaded_file($_FILES["stuImage"]["tmp_name"], "./images/student/" . $newFileName);
                                if (!$imageUploaded) {
                                        die("อัปโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
                                }
                        } else {
                                die("อัปโหลดรูปไม่สำเร็จ กรุณาลองใหม่อีกครั้ง");
                        }
                }

                //เรียกใช้คำสั่งบันทึกข้อมูลลง Table (student_tb) ใน DB (dti_info_db)
                if ($student->updateStudentByStuId()) {
                        echo "<h3>บันทึกข้อมูลแล้ว </h3>";
                } else {
                        echo "<h3>บันทึกข้อมูลไม่สำเร็ว</h3>";
                }

                //ค้างไว้ 2 วินาที แล้วให้ redirect ไปที่หน้า student_showall.php
                header("Refresh:2; url=./student_showall.php");
        }

        ?>


</body>

</html>