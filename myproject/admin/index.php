<?php
// 🔐 กันคนที่ยังไม่ login
require "auth.php";

// 🔗 เชื่อมต่อฐานข้อมูล
require "../config/db.php";

// 📥 ดึงข้อมูลสมาชิก
$result = $conn->query("SELECT * FROM members ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>Admin - รายชื่อสมาชิก</title>
  <style>
    body { font-family: sans-serif; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; }
    th { background: #f2f2f2; }
  </style>
</head>
<body>

<h1>หน้า Admin</h1>
<h3>รายชื่อสมาชิกที่สมัคร</h3>

<p>
  <a href="logout.php">ออกจากระบบ</a>
</p>

<table>
  <tr>
    <th>ID</th>
    <th>ชื่อ</th>
    <th>เบอร์โทร</th>
    <th>อายุ</th>
    <th>กลุ่ม</th>
    <th>วันที่สมัคร</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo htmlspecialchars($row["name"]); ?></td>
      <td><?php echo htmlspecialchars($row["phone"]); ?></td>
      <td><?php echo $row["age"]; ?></td>
      <td><?php echo htmlspecialchars($row["group_name"]); ?></td>
      <td><?php echo $row["created_at"]; ?></td>
    </tr>
  <?php endwhile; ?>

</table>

</body>
</html>
