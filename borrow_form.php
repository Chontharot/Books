<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกการยืมหนังสือ - ระบบห้องสมุด</title>
    <style>
        /* สไตล์พื้นฐาน */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; 
            background-color: #f4f7f6; 
            margin: 0; 
        }

        /* แถบเมนู (Navbar) */
        .navbar { background: #2c3e50; padding: 15px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar a { color: white; text-decoration: none; padding: 10px 20px; margin: 0 5px; border-radius: 5px; transition: 0.3s; }
        .navbar a:hover { background: #34495e; color: #3498db; }

        /* ส่วนเนื้อหา */
        .container { 
            max-width: 600px; 
            margin: 40px auto; 
            background: white; 
            padding: 40px; 
            border-radius: 15px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
        }

        h2 { 
            color: #2c3e50; 
            text-align: center; 
            margin-bottom: 30px; 
            border-bottom: 3px solid #28a745; 
            display: inline-block;
            padding-bottom: 5px;
        }

        /* ฟอร์ม */
        .form-group { margin-bottom: 20px; text-align: left; }
        label { 
            display: block; 
            font-weight: bold; 
            margin-bottom: 8px; 
            color: #444;
        }

        select, input { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            font-size: 16px; 
            box-sizing: border-box; /* ป้องกัน Input ล้นขอบ */
            background-color: #fafafa;
        }

        select:focus, input:focus {
            border-color: #28a745;
            outline: none;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.1);
        }

        /* ปุ่มกด */
        .btn-group { text-align: center; margin-top: 30px; }
        button { 
            padding: 12px 35px; 
            background: #28a745; 
            color: white; 
            border: none; 
            border-radius: 8px; 
            font-size: 18px; 
            font-weight: bold; 
            cursor: pointer; 
            transition: 0.3s;
        }
        button:hover { background: #218838; transform: translateY(-2px); }
        
        .btn-cancel {
            display: inline-block;
            margin-left: 15px;
            text-decoration: none;
            color: #666;
            font-size: 16px;
        }
        .btn-cancel:hover { color: #cc0000; }
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

<div class="container" style="text-align: center;">
    <h2>บันทึกการยืมหนังสือ</h2>
    
    <form action="save_borrow.php" method="POST">
        <div class="form-group">
            <label>📖 เลือกหนังสือที่ต้องการยืม:</label>
            <select name="book_id" required>
                <option value="">-- กรุณาเลือกหนังสือ --</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM Books WHERE status = 'ว่าง'");
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='".$row['book_id']."'>[".$row['book_id']."] ".$row['title']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>👤 ชื่อผู้ยืม:</label>
            <select name="user_id" required>
                <option value="">-- กรุณาเลือกผู้ใช้งาน --</option>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM Users");
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<option value='".$row['user_id']."'>".$row['fullname']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>📅 วันที่ยืม:</label>
            <input type="date" name="borrow_date" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="btn-group">
            <button type="submit">บันทึกการยืม</button>
            <a href="index.php" class="btn-cancel">ยกเลิก</a>
        </div>
    </form>
</div>

</body>
</html>