<?php
session_start();
include('dbcon.php');

if(isset($_SESSION['uid'])){
    header('Location: admin/admindash.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-logo">
        <img src="images/logo.png" alt="SMS Logo">
        <span>SMS</span> </div>

    <div class="nav-menu">
        <a href="index.php">Home</a>
        <a href="login.php" class="nav-btn">Admin Login</a>
    </div>
</nav>

<form method="post" class="form-card login-card">
    
    <div class="form-title">Admin Login</div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="uname" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="pass" required>
    </div>

    <input type="submit" name="login" value="Login">
</form>
</body>
</html>

<?php
if(isset($_POST['login'])){

$user = $_POST['uname'];
$pass = $_POST['pass'];

$qry = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
$run = mysqli_query($conn,$qry);

if(mysqli_num_rows($run)){
$data = mysqli_fetch_assoc($run);
$_SESSION['uid'] = $data['id'];
header('Location: admin/admindash.php');
exit;
}else{
echo "<script>alert('Invalid login')</script>";
}
}
?>
