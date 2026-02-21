<?php
// 1. ใส่ข้อมูลการเชื่อมต่อที่ได้จาก Dokploy (ตอนที่คุณกดสร้าง MariaDB)
$servername = "s6860506035db-suha-mqykhr"; // หรือชื่อ Host ที่ Dokploy ให้มา
$username = "6860506035"; // เปลี่ยนเป็น Username ที่คุณตั้งไว้
$password = "Suha_2006"; // เปลี่ยนเป็น Password ที่คุณตั้งไว้
$dbname = "suha"; // เปลี่ยนเป็นชื่อ Database ที่คุณสร้างไว้

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อว่าสำเร็จไหม
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// 2. คำสั่ง SQL สำหรับสร้างตาราง (Create Table) ให้ AI ช่วยเขียนให้
$sql = "CREATE TABLE IF NOT EXISTS tree_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tree_name VARCHAR(100) NOT NULL,
    species VARCHAR(100),
    planted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// 3. สั่งรันคำสั่ง SQL
if ($conn->query($sql) === TRUE) {
    echo "ระบบทำการสร้างตาราง tree_info ใน MariaDB สำเร็จแล้ว! (เตรียมรับ 5 คะแนน)";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

$conn->close();
?>
