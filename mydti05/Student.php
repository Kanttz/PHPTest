<?php
//เป็นคลาสที่ทำงานกับ Table ใน Database
class Student
{
    //ประกาศ Data เป็นชื่อเดียวกับชื่อ Column ใน Database
    public $stuId;
    public $stuName;
    public $stuMidterm;
    public $stuFinal;
    public $stuGpa;
    public $stuImage;
    public $stuTotalScore;

    //ประกาศตัวแปรที่จะใช้เพื่อเก็บข้อมูลการติดต่อ Database
    private $conn_db;

    //คอนสตรักเตอร์ เพื่อทำการติดต่อ Database
    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    //ส่วนของเมธอดต่างๆ ที่ทำงานกับ Table
    //การทำงานกับ Table มี (CRUD)
    //insert/Create, select/Read, Update, Delete
    //เพิ่มใหม่, ค้นหา/ดู/ตรวจสอบ, แก้ไข, ลบ
    //เพิ่มนักเรียนใหม่ลง Table
    public function insertStudent()
    {
        //คำสั่ง SQL
        $strSQL = "INSERT INTO student_tb
                   (stuId, stuName, stuMidterm, stuFinal, stuGpa, stuImage, stuTotalScore)
                   VALUES
                   (:stuId, :stuName, :stuMidterm, :stuFinal, :stuGpa, :stuImage, :stuTotalScore)";

        //สร้าง statement เพื่อที่จะทำงานกับคำสั่ง SQL
        $stat = $this->conn_db->prepare($strSQL);

        //ตรวจสอบข้อมูลก่อนที่จะกำหนดให้กับ parameter ที่คำสั่ง SQL
        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));
        $this->stuName = htmlspecialchars(stripcslashes(strip_tags($this->stuName)));
        $this->stuMidterm = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuMidterm))));
        $this->stuFinal = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuFinal))));
        $this->stuGpa = floatval(htmlspecialchars(stripcslashes(strip_tags($this->stuGpa))));
        $this->stuImage = htmlspecialchars(stripcslashes(strip_tags($this->stuImage)));
        $this->stuTotalScore = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuTotalScore))));

        //เอาข้อมูลที่ตรวจสอบไปกำหนดให้กับ parameter ที่คำสั่ง SQL เรียก bind param
        $stat->bindParam(":stuId", $this->stuId);
        $stat->bindParam(":stuName", $this->stuName);
        $stat->bindParam(":stuMidterm", $this->stuMidterm);
        $stat->bindParam(":stuFinal",  $this->stuFinal);
        $stat->bindParam(":stuGpa", $this->stuGpa);
        $stat->bindParam(":stuImage", $this->stuImage);
        $stat->bindParam(":stuTotalScore", $this->stuTotalScore);

        //สั่งให้ SQL ทำงานผ่าน statement ($stat)
        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    } //ปิดของ insertStudent

    //แก้ไขนักเรียนใน Table โดยใช้ stuId เป็นเงื่อนไขในการแก้ไข
    public function updateStudentByStuId()
    {
        //คำสั่ง SQL
        // สร้างตัวแปร strSQL เพื่อเก็บคำสั่ง SQL
        // ตรวจสอบว่ามีการเปลี่ยนรูปภาพหรือไม่
        // ถ้าไม่มีการเปลี่ยนรูปภาพ ให้ไม่มีการแก้ไข stuImage

        $strSQL = "UPDATE student_tb SET
                    stuName=:stuName, stuMidterm=:stuMidterm, stuFinal=:stuFinal, 
                    stuGpa=:stuGpa, stuTotalScore=:stuTotalScore";
        if (!empty($this->stuImage)) {
            $strSQL .= ", stuImage=:stuImage";
        }
        $strSQL .= " WHERE stuId=:stuId";


        //สร้าง statement เพื่อที่จะทำงานกับคำสั่ง SQL
        $stat = $this->conn_db->prepare($strSQL);

        //ตรวจสอบข้อมูลก่อนที่จะกำหนดให้กับ parameter ที่คำสั่ง SQL
        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));
        $this->stuName = htmlspecialchars(stripcslashes(strip_tags($this->stuName)));
        $this->stuMidterm = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuMidterm))));
        $this->stuFinal = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuFinal))));
        $this->stuGpa = floatval(htmlspecialchars(stripcslashes(strip_tags($this->stuGpa))));
        $this->stuTotalScore = intval(htmlspecialchars(stripcslashes(strip_tags($this->stuTotalScore))));
        if ($this->stuImage != "") {
            $this->stuImage = htmlspecialchars(stripcslashes(strip_tags($this->stuImage)));
        }



        //เอาข้อมูลที่ตรวจสอบไปกำหนดให้กับ parameter ที่คำสั่ง SQL เรียก bind param
        $stat->bindParam(":stuId", $this->stuId);
        $stat->bindParam(":stuName", $this->stuName);
        $stat->bindParam(":stuMidterm", $this->stuMidterm);
        $stat->bindParam(":stuFinal",  $this->stuFinal);
        $stat->bindParam(":stuGpa", $this->stuGpa);
        $stat->bindParam(":stuTotalScore", $this->stuTotalScore);
        if ($this->stuImage != "") {
            $stat->bindParam(":stuImage", $this->stuImage);
        }




        //สั่งให้ SQL ทำงานผ่าน statement ($stat)
        if ($stat->execute()) {
            return true; //คือทำ SQL สำเร็จ
        } else {
            return false; //คือทำ SQL ไม่สำเร็จ
        }
    } //ปิดของ updateStudentByStuId

    //ลบนักเรียนใน Table โดยใช้ stuId เป็นเงื่อนไขในการลบ
    public function deleteStudentByStuId()
    {
        //คำสั่ง SQL
        $strSQL = "DELETE FROM student_tb WHERE stuId=:stuId";

        //สร้าง statement เพื่อที่จะทำงานกับคำสั่ง SQL
        $stat = $this->conn_db->prepare($strSQL);

        //ตรวจสอบข้อมูลก่อนที่จะกำหนดให้กับ parameter ที่คำสั่ง SQL
        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));

        //เอาข้อมูลที่ตรวจสอบไปกำหนดให้กับ parameter ที่คำสั่ง SQL เรียก bind param
        $stat->bindParam(":stuId", $this->stuId);

        //สั่งให้ SQL ทำงานผ่าน statement ($stat)
        if ($stat->execute()) {
            return true; //คือทำ SQL สำเร็จ
        } else {
            return false; //คือทำ SQL ไม่สำเร็จ
        }
    } //ปิดของ deleteStudentByStuId

    //แสดงข้อมูลนักเรียนทั้งหมดใน Table 
    public function getAllStudent()
    {
        //คำสั่ง SQL
        $strSQL = "SELECT * FROM student_tb";

        //สร้าง statement เพื่อที่จะทำงานกับคำสั่ง SQL
        $stat = $this->conn_db->prepare($strSQL);

        //สั่งให้ SQL ทำงานผ่าน statement ($stat)
        $stat->execute();

        //return สิ่งที่ได้จาก SQL ไปใช้งาน
        return $stat;
    } //ปิดของ getAllStudent

    //แสดงข้อมูลนักเรียนจาก Table โดยใช้ stuId เป็นเงื่อนไข
    public function getStudentByStuId()
    {
        //คำสั่ง SQL
        $strSQL = "SELECT * FROM student_tb WHERE stuId=:stuId";

        //สร้าง statement เพื่อที่จะทำงานกับคำสั่ง SQL
        $stat = $this->conn_db->prepare($strSQL);

        //ตรวจสอบข้อมูลก่อนที่จะกำหนดให้กับ parameter ที่คำสั่ง SQL
        $this->stuId = htmlspecialchars(stripcslashes(strip_tags($this->stuId)));

        //เอาข้อมูลที่ตรวจสอบไปกำหนดให้กับ parameter ที่คำสั่ง SQL เรียก bind param
        $stat->bindParam(":stuId", $this->stuId);

        //สั่งให้ SQL ทำงานผ่าน statement ($stat)
        $stat->execute();

        //return สิ่งที่ได้จาก SQL ไปใช้งาน
        return $stat;
    } //ปิดของ getStudentByStuId
}// ปิดของ Student