<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก - ระบบห้องสมุด</title>
    <style>
        /* สไตล์พื้นฐาน */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; 
            background-color: #f4f7f6; 
            margin: 0; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* แถบเมนู (Navbar) */
        .navbar { background: #2c3e50; padding: 15px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar a { color: white; text-decoration: none; padding: 10px 20px; margin: 0 5px; border-radius: 5px; transition: 0.3s; }
        .navbar a:hover { background: #34495e; color: #3498db; }

        /* จัดกึ่งกลางฟอร์ม */
        .wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* กล่องฟอร์ม */
        .form-box { 
            width: 100%;
            max-width: 400px; 
            padding: 40px; 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }

        .form-box h3 { 
            color: #2c3e50; 
            margin-bottom: 30px; 
            font-size: 24px;
            border-bottom: 2px solid #3498db;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* ช่องกรอกข้อมูล */
        input { 
            width: 100%; 
            padding: 12px 15px; 
            margin: 10px 0; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            box-sizing: border-box; /* สำคัญ: ทำให้ padding ไม่ดันขนาดช่อง */
            font-size: 16px;
            transition: 0.3s;
        }
        
        input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
        }

        /* ปุ่มกด */
        button { 
            width: 100%; 
            padding: 12px; 
            margin-top: 20px;
            background-color: #3498db; 
            color: white; 
            border: none; 
            border-radius: 8px; 
            font-size: 18px; 
            font-weight: bold;
            cursor: pointer; 
            transition: background 0.3s;
        }

        button:hover { 
            background-color: #2980b9; 
        }

        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php">หน้าแรก</a>
    <a href="register.php">สมัครสมาชิก</a>
    <a href="Login.php">เข้าสู่ระบบ</a>
    <a href="borrow_form.php">ยืมหนังสือ</a>
    <a href="return.php">คืนหนังสือ</a>
    <a href="history.php">ประวัติการยืม-คืน</a>
</div>

<div class="wrapper">
    <div class="form-box">
        <h3>สมัครสมาชิกใหม่</h3>
        <form method="POST">
            <input type="text" name="user_id" placeholder="รหัสผู้ใช้ (เช่น U004)" required>
            <input type="text" name="fullname" placeholder="ชื่อ-นามสกุล" required>
            <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required>
            <button type="submit" name="submit">ลงทะเบียนสมาชิก</button>
        </form>
    </div>
</div>

<?php
// ส่วน Logic การเชื่อมต่อฐานข้อมูลและ INSERT (เหมือนเดิมทุกอย่าง)
if(isset($_POST['submit'])) {
    $id = $_POST['user_id'];
    $name = $_POST['fullname'];
    $phone = $_POST['phone'];
    
    // ป้องกัน SQL Injection เบื้องต้น (แนะนำแต่ไม่ได้เปลี่ยนโครงสร้างหลักของคุณ)
    $id = mysqli_real_escape_string($conn, $id);
    $name = mysqli_real_escape_string($conn, $name);
    $phone = mysqli_real_escape_string($conn, $phone);

    $sql = "INSERT INTO Users (user_id, fullname, phone) VALUES ('$id', '$name', '$phone')";
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($conn) . "');</script>";
    }
}
?>

</body>
</html>