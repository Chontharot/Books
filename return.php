<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>คืนหนังสือ - ระบบห้องสมุด</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; background-color: #f4f7f6; margin: 0; }
        
        /* Navbar */
        .navbar { background: #2c3e50; padding: 15px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar a { color: white; text-decoration: none; padding: 10px 20px; margin: 0 5px; border-radius: 5px; transition: 0.3s; }
        .navbar a:hover { background: #34495e; color: #3498db; }

        /* Container */
        .container { max-width: 800px; margin: 40px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; text-align: center; margin-bottom: 25px; border-bottom: 2px solid #e74c3c; display: inline-block; padding-bottom: 10px; }

        /* Table Design */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 8px; overflow: hidden; }
        th { background-color: #e74c3c; color: white; padding: 15px; text-align: left; }
        td { padding: 15px; border-bottom: 1px solid #eee; color: #333; }
        tr:hover { background-color: #fff5f5; }

        /* Return Button */
        .btn-return {
            background-color: #e74c3c;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 0.9em;
            transition: 0.3s;
            display: inline-block;
        }
        .btn-return:hover { background-color: #c0392b; box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3); }

        .btn-back { display: block; text-align: center; margin-top: 25px; color: #7f8c8d; text-decoration: none; }
        .btn-back:hover { color: #2c3e50; }
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
    <h2>รายการคืนหนังสือ</h2>
    
    <table>
        <thead>
            <tr>
                <th>รหัสหนังสือ</th>
                <th>ชื่อหนังสือ</th>
                <th style="text-align: center;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ดึงเฉพาะเล่มที่สถานะเป็น 'ถูกยืม' (ข้อมูลเดิมของคุณ)
            $res = mysqli_query($conn, "SELECT * FROM Books WHERE status = 'ถูกยืม'");
            
            if (mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td><strong>{$row['book_id']}</strong></td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td style='text-align: center;'>
                            <a href='update_status.php?id={$row['book_id']}' class='btn-return'>↩ กดคืนหนังสือ</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center; padding: 30px; color: #999;'>ไม่มีหนังสือที่ถูกยืมในขณะนี้</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="index.php" class="btn-back">← กลับหน้าหลัก</a>
</div>

</body>
</html>