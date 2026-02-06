<?php 
include('connect.php');
if(isset($_POST['add'])) {
    $id = $_POST['book_id'];
    $title = $_POST['title'];
    $sql = "INSERT INTO Books (book_id, title, status) VALUES ('$id', '$title', 'ว่าง')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
<form method="POST">
    <h3>เพิ่มหนังสือใหม่</h3>
    <input type="text" name="book_id" placeholder="รหัสหนังสือ" required><br>
    <input type="text" name="title" placeholder="ชื่อหนังสือ" required><br>
    <button type="submit" name="add">บันทึก</button>
</form>