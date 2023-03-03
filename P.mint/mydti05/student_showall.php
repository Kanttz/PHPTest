<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>

<body>
        <h1>แสดงข้อมูลนักเรียน DTI ทั้งหมด</h1>
        <hr>
        <a href="./student_new.php">เพิ่มข้อมูลนักเรียน</a>
        <hr>
        <?php
        require_once "./ConnectDatabase.php";
        require_once "./Student.php";

        //สร้าง object ของคลาส ConnnectDatabase
        $connectDatabase = new ConnnectDatabase();
        //สร้าง object ของคลาส Student
        $student = new Student($connectDatabase->getConnectDatabase());

        //เรียกใช้คำสั่งเอาข้อมูลจาก Table (studetn_tb) มาแสดง
        $result = $student->getAllStudent();

        //ดูข้อมูลที่อยู่ใน $result ว่ามีได้ ด้วยการนับจำนวนแถว/เรคคอร์ด
        $numRow = $result->rowCount();

        //ตรวจสอบจำนวนแถว/เรคคอร์ดเพื่อแสดงผลข้อมูล
        if ($numRow > 0) {
                //มีข้อมูล ก็แสดงผลออกมา โดยการวนลูปเพื่อ
                //เข้าถึงข้อมูลแต่ละแถว/เรคคอร์ด ใน $result    
                echo "<table border=\"1\" width=\"800\">";
                echo "<tr><td>รหัส</td><td>รูป</td><td>ชื่อ-สกุล</td><td>คะแนนรวม</td><td>GPA</td><td>UPDATE/DELETE</td></tr>";

                while ($dataRow = $result->fetch(PDO::FETCH_ASSOC)) {
                        extract($dataRow);
                        echo "<tr>";
                        echo "<td>" . $stuId . "</td>";

                        if (empty($stuImage)) {
                                echo "<td><img src=\"./images/logo.png\" height=\"100\"></td>";
                        } else {
                                echo "<td><img src=\"./images/students/" . $stuImage . "\" height=\"100\"></td>";
                        }

                        echo "<td>" . $stuName . "</td>";
                        echo "<td>" . $stuTotalScore . "</td>";
                        echo "<td>" . $stuGpa . "</td>";
                        //echo "<td>แก้ไข&nbsp;&nbsp;&nbsp;ลบ</td>";
                        echo "<td>";
                        echo "<a href=\"./student_update.php?stuId=" . $stuId . "&stuName=" . $stuName . "&stuMidterm=" . $stuMidterm . "&stuFinal=" . $stuFinal . "&stuGpa=" . $stuGpa . "&stuImage=" . $stuImage . "\">แก้ไข</a>";
                        echo "&nbsp;&nbsp;&nbsp;";
                        echo "<a href=\"./student_delete_result.php?stuId=" . $stuId . "\">ลบ</a>";
                        echo "</td>";
                        echo "</tr>";
                }

                echo "</table>";
        } else {
                //ไม่มีข้อมูล 
                echo "<h3>ไม่มีข้อมูลนักเรียนใน DB</h3>";
        }

        ?>


</body>

</html>