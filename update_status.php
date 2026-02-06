<?php
include 'connect.php'; // ไฟล์เชื่อมต่อฐานข้อมูลของคุณ

// รับค่า id จาก URL
if(isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // คำสั่ง SQL สำหรับเปลี่ยนสถานะหนังสือ 
    // สมมติว่าตารางชื่อ books และคอลัมน์สถานะชื่อ status
    // '0' อาจจะหมายถึง ว่าง/คืนแล้ว, '1' หมายถึง ถูกยืม
    $sql = "UPDATE books SET status = 'ว่าง' WHERE book_id = '$book_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('คืนหนังสือเรียบร้อยแล้ว');</script>";
        echo "<script>window.location.href='index.php';</script>"; // กลับไปหน้าหลัก
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>