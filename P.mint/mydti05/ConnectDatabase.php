<?php
//เป็นคลาสที่ใช้ติดต่อกับ Database
class ConnnectDatabase
{
    //DATA
    private $host = "localhost";
    private $username = "root"; //ชื่อผู้ใช้ ที่เข้าใช้งาน DB Server
    private $password = ""; //รหัสผ่าน ที่เข้าใช้งาน DB Server
    private $dbname = "dti_info_db"; //ชื่อ DB ที่จะใช้งาน
    private $conn_db; //ตัวแปรที่จะใช้เก็บข้อมูลการติดต่อกับ DB

    //เมธอดที่ใช้ในการติดต่อกับ DB
    public function getConnectDatabase()
    {
        $this->conn_db = null;

        try {
            //connnect DB
            $this->conn_db = new PDO("mysql:host=" .
                $this->host . ";dbname=" .
                $this->dbname, $this->username, $this->password);
            //set character encode
            $this->conn_db->exec("set names utf8");
            // set the PDO error mode to exception            
            $this->conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connected successfully"; 
        } catch (PDOException $e) {
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connection failed: " . $e->getMessage(); 
        }

        return $this->conn_db;
    } // ปิดเมธอด getConnectDatabase


} //ปิดคลาส ConnnectDatabase