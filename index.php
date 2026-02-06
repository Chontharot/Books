<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบห้องสมุด</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; background-color: #f4f7f6; margin: 0; }
        
        /* แถบเมนูใหม่ */
        .navbar { background: #2c3e50; padding: 15px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar a { color: white; text-decoration: none; padding: 10px 20px; margin: 0 5px; border-radius: 5px; transition: 0.3s; }
        .navbar a:hover { background: #34495e; color: #3498db; }

        /* ส่วนเนื้อหา */
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; text-align: center; margin-bottom: 25px; border-bottom: 2px solid #3498db; display: inline-block; padding-bottom: 10px; }

        /* ตารางแบบ Modern */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; overflow: hidden; border-radius: 8px; }
        th { background-color: #3498db; color: white; padding: 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; color: #555; }
        tr:hover { background-color: #f9f9f9; }

        /* ตกแต่งสถานะ (Badge) */
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 0.9em; font-weight: bold; }
        .status-green { background-color: #d4edda; color: #155724; }
        .status-red { background-color: #f8d7da; color: #721c24; }
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
    <h2>สถานะหนังสือทั้งหมด</h2>
    <table>
        <thead>
            <tr>
                <th>รหัสหนังสือ</th>
                <th>ชื่อหนังสือ</th>
                <th style="text-align: center;">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM Books";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    // กำหนด Class ตามสถานะ
                    $statusClass = ($row['status'] == 'ว่าง') ? 'status-green' : 'status-red';
                    
                    echo "<tr>";
                    echo "<td>" . $row['book_id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td style='text-align: center;'><span class='status-badge $statusClass'>" . $row['status'] . "</span></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center;'>ไม่มีข้อมูลหนังสือ</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>