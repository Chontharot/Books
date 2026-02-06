<?php 
include('connect.php');
session_start();

// คง Logic การ Login เดิมไว้ทั้งหมด
if(isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM Users WHERE user_id = '$user_id'");
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");
    } else {
        echo "<script>alert('ไม่พบรหัสผู้ใช้งาน');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ - ระบบห้องสมุด</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; 
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); /* พื้นหลังไล่เฉดสีให้ดูแพง */
            margin: 0; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* กล่อง Login */
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-card h3 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 22px;
            font-weight: 600;
        }

        /* ช่องกรอกข้อมูล */
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 2px solid #eee;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s;
        }

        input[type="text"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.1);
        }

        /* ปุ่มตกลง */
        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #2980b9;
        }

        button:active {
            transform: scale(0.98);
        }

        /* ลิงก์กลับหน้าหลัก หรือสมัครสมาชิก */
        .footer-links {
            margin-top: 20px;
            font-size: 14px;
        }
        .footer-links a {
            color: #7f8c8d;
            text-decoration: none;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3>เข้าสู่ระบบผู้ใช้งาน</h3>
        <form method="POST">
            <input type="text" name="user_id" placeholder="กรอกรหัสผู้ใช้" required>
            <button type="submit" name="login">ตกลง</button>
        </form>
        
        <div class="footer-links">
            <a href="index.php">กลับหน้าแรก</a> | 
            <a href="register.php">สมัครสมาชิกใหม่</a>
        </div>
    </div>

</body>
</html>