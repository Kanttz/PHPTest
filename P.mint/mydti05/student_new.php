<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักเรียน - DTI Website 2023</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
</head>

<body>
    <h1>เพิ่มข้อมูลนักเรียน DTI</h1>
    <hr>
    <a href="./student_showall.php">แสดงข้อมูลนักเรียนทั้งหมด</a>
    <hr>
    <form action="./student_new_result.php" method="post" enctype="multipart/form-data">
        รหัสนักเรียน : <input type="text" name="stuId" id=""> <br><br>
        ชื่อ-สกุลนักเรียน : <input type="text" name="stuName" id=""> <br><br>
        คะแนนกลางภาคนักเรียน : <input type="text" name="stuMidterm" id=""> <br><br>
        คะแนนปลายภาคนักเรียน : <input type="text" name="stuFinal" id=""> <br><br>
        GPA นักเรียน : <input type="text" name="stuGpa" id=""> <br><br>
        เลือกรูป (png/jpg/jpeg) : <input type="file" name="stuImage" id="" accept=".png, .jpg, .jpeg">
        <hr>
        <input type="submit" value="บันทึก">
        <input type="reset" value="ยกเลิก">
    </form>

</body>

</html>