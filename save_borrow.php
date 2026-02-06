<?php
include('connect.php');

$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];
$borrow_date = $_POST['borrow_date'];

// 1. บันทึกลงตาราง Borrowing
$sql1 = "INSERT INTO Borrowing (book_id, user_id, borrow_date) VALUES ('$book_id', '$user_id', '$borrow_date')";

// 2. อัปเดตสถานะหนังสือเป็น 'ถูกยืม'
$sql2 = "UPDATE Books SET status = 'ถูกยืม' WHERE book_id = '$book_id'";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
    echo "<script>alert('บันทึกสำเร็จ!'); window.location='index.php';</script>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}
?>