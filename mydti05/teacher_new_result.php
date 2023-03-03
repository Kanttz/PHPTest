<!-- Use the same layout as student_new_result.php just change from student to teacher -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ผลลัพธ์เพิ่มข้อมูลอาจารย์</h1>
    <hr>
    <?php
    if (!empty($_POST)) {
        require_once "./ConnectDatabase.php";
        require_once "./Teacher.php";



        //สร้าง object ของคลาส ConnnectDatabase
        $connectDatabase = new ConnnectDatabase();
        //สร้าง object ของคลาส Student
        $teacher = new Teacher($connectDatabase->getConnectDatabase());

        //เอาข้อมูลที่ส่งมากำหนดให้กับ data ที่สร้างไว้ที่ Student
        $teacher->teaId = $_POST['teaId'];
        $teacher->teaName = $_POST['teaName'];
        $teacher->teaTel = $_POST['teaTel'];
        $teacher->teaImage = $_POST['teaImage'];

        //เรียกใช้งาน function ที่อยู่ในคลาส Student
        $result = $teacher->updateTeacher();


        //เรียกใช้คำสั่งบันทึกข้อมูลลง Table (student_tb) ใน DB (dti_info_db)
        if ($teacher->insertTeacher()) {
            echo "บันทึกข้อมูลสำเร็จ";
        } else {
            echo "บันทึกข้อมูลไม่สำเร็จ";
        }

        //ค้างไว้ 2 วินาที แล้วให้ redirect ไปที่หน้า student_showall.php
        header("Refresh:2; url=./teacher_showall.php");
    }

    ?>

</body>

</html>