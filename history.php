<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ประวัติการยืม-คืน - ระบบห้องสมุด</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Sarabun'; background-color: #f4f7f6; margin: 0; }
        
        /* Navbar */
        .navbar { background: #2c3e50; padding: 15px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .navbar a { color: white; text-decoration: none; padding: 10px 20px; margin: 0 5px; border-radius: 5px; transition: 0.3s; }
        .navbar a:hover { background: #34495e; color: #3498db; }

        /* Container */
        .container { max-width: 1000px; margin: 40px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h2 { color: #2c3e50; text-align: center; margin-bottom: 25px; border-bottom: 3px solid #34495e; display: inline-block; padding-bottom: 10px; }

        /* Table Style */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th { background-color: #2c3e50; color: white; padding: 15px; text-align: left; font-weight: 500; }
        td { padding: 15px; border-bottom: 1px solid #eee; color: #444; }
        
        /* สลับสีแถวให้ดูง่าย */
        tr:nth-child(even) { background-color: #fcfcfc; }
        tr:hover { background-color: #f1f4f9; transition: 0.2s; }

        /* ตกแต่งวันที่และตัวหนังสือ */
        .date-text { color: #2980b9; font-weight: bold; font-family: 'Courier New', monospace; }
        .user-name { font-weight: 600; color: #333; }
        .book-title { color: #555; font-style: italic; }
        
        .empty-row { text-align: center; padding: 40px; color: #999; }
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
    <h2>📜 ประวัติการยืม-คืนหนังสือ</h2>

    <table>
        <thead>
            <tr>
                <th>📅 วันที่ยืม</th>
                <th>👤 ชื่อผู้ยืม</th>
                <th>📘 ชื่อหนังสือ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ข้อมูล Query เดิมของคุณ (ห้ามเปลี่ยน)
            $sql = "SELECT Borrowing.borrow_date, Users.fullname, Books.title 
                    FROM Borrowing
                    JOIN Users ON Borrowing.user_id = Users.user_id
                    JOIN Books ON Borrowing.book_id = Books.book_id
                    ORDER BY Borrowing.borrow_date DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><span class='date-text'>{$row['borrow_date']}</span></td>";
                    echo "<td><span class='user-name'>{$row['fullname']}</span></td>";
                    echo "<td><span class='book-title'>{$row['title']}</span></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='empty-row'>ยังไม่มีประวัติการทำรายการในขณะนี้</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>