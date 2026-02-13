<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-logo">
        <img src="images/logo.png" alt="SMS Logo"><span>SMS</span>
    </div>

    <div class="nav-menu">
        <a href="index.php">Home</a>
        <a href="login.php">Admin Login</a>
    </div>
</nav>


<h1>Welcome to Student Management System</h1>

<form class="form-card" method="post">
    <div class="form-group">
        <label>Roll No</label>
        <input type="text" name="rollno">
    </div>
     <div class="form-group">
        <label>Choose Standard</label>
        <select name="standard">
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Student Info">
</form>

</body>
</html>
<?php
include('dbcon.php');
include('function.php');
if(isset($_POST['submit']))
{
    $rollno = $_POST['rollno'];
    $standard = $_POST['standard'];

    showDetails($rollno,$standard);
}
?>