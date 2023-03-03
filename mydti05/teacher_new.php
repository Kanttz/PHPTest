<!-- Use the same layout as student_new.php just change from student to teacher -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลอาจารย์ - DTI Website 2023</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
    <h1>เพิ่มข้อมูลอาจารย์ DTI</h1>
    <hr>
    <a href="./teacher_showall.php">แสดงข้อมูลอาจารย์ทั้งหมด</a>
    <hr>
    <form action="./teacher_new_result.php" method="post" enctype="multipart/form-data">
        รหัสอาจารย์ : <input type="text" name="teaId" id=""> <br><br>
        ชื่อ-สกุลอาจารย์ : <input type="text" name="teaName" id=""> <br><br>
        เลือกรูป : <input type="file" name="teaImage" id="" accept=".png, .jpg, .jpeg, .ARW"> <br><br>
        <hr>
        <input type="submit" value="บันทึก">
        <input type="reset" value="ยกเลิก">
    </form>
</body>

</html>