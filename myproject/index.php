<?php
require "config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name  = $_POST["name"] ?? "";
  $phone = $_POST["phone"] ?? "";
  $age   = $_POST["age"] ?? "";
  $group = $_POST["group"] ?? "";

  if ($name && $phone) {
    $stmt = $conn->prepare(
      "INSERT INTO members (name, phone, age, group_name)
       VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssis", $name, $phone, $age, $group);
    $stmt->execute();

    $message = "สมัครเรียบร้อยแล้ว";
  }
}
?>
<h1>สมัครสมาชิก / สมัครค่าย</h1>

<form method="post">
  <p>
    <input type="text" name="name" placeholder="ชื่อ-นามสกุล" required>
  </p>
  <p>
    <input type="text" name="phone" placeholder="เบอร์โทร" required>
  </p>
  <p>
    <input type="number" name="age" placeholder="อายุ">
  </p>
  <p>
    <input type="text" name="group" placeholder="กลุ่ม / คริสตจักร">
  </p>

  <button type="submit">สมัคร</button>
</form>

<?php if ($message): ?>
  <p><?php echo $message; ?></p>
<?php endif; ?>
