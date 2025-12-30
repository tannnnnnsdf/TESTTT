<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $user = $_POST["username"] ?? "";
  $pass = $_POST["password"] ?? "";

  // 👇 กำหนด user/pass (ระดับ 1 ใช้แบบนี้ก่อน)
  if ($user === "admin" && $pass === "1234") {
    $_SESSION["admin_login"] = true;
    header("Location: index.php");
    exit;
  } else {
    $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
  }
}
?>

<h2>Admin Login</h2>

<form method="post">
  <p>
    <input type="text" name="username" placeholder="Username" required>
  </p>
  <p>
    <input type="password" name="password" placeholder="Password" required>
  </p>
  <button type="submit">เข้าสู่ระบบ</button>
</form>

<?php if ($error): ?>
  <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
