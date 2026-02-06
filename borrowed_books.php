<?php include('connect.php'); ?>
<h2>รายการหนังสือที่ถูกยืมอยู่ในขณะนี้</h2>
<table border="1">
    <tr>
        <th>รหัสหนังสือ</th>
        <th>ชื่อหนังสือ</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM Books WHERE status = 'ถูกยืม'");
    while($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['book_id']}</td>
                <td>{$row['title']}</td>
              </tr>";
    }
    ?>
</table>