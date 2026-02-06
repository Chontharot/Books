<?php include('connect.php'); ?>
<h2>จัดการข้อมูลสมาชิก</h2>
<table border="1">
    <tr>
        <th>รหัสสมาชิก</th>
        <th>ชื่อ-นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM Users");
    while($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['phone']}</td>
              </tr>";
    }
    ?>
</table>