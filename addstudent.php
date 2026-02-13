<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: ../login.php');
    exit;
}

include('header.php');
?>

<div style="text-align: right; margin-top:20px;">
   <a href="admindash.php" 
       style="text-decoration:none; background:#2c3e50; color:white; padding:8px 14px; border-radius:6px; font-size:14px;">
       ← Admin Dashboard
   </a>
</div>
<h1>Add Student</h1>
<form method="post" class="form-card" enctype="multipart/form-data">

<div class="form-group">
<label>Roll No:</label>
<input type="text" name="rollno">
</div>

<div class="form-group">
<label>Full Name:</label>
<input type="text" name="name">
</div>

<div class="form-group">
<label>City:</label>
<input type="text" name="city">
</div>

<div class="form-group">
<label>Parents Contact no:</label>
<input type="text" name="pcon">
</div>

<div class="form-group">
<label>Standard:</label>
<input style="width:100%" type="number" name="standard">
</div>

<div class="form-group">
<label>Image:</label>
<input type="file" name="simg">
</div>

<input type="submit" name="insert" value="Insert">
</form>
<?php
include('../dbcon.php');

if(isset($_POST['insert'])){
    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['standard'];
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempname,"../dataimg/$imagename");


    $qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`)
     VALUES ('$roll','$name','$city','$pcon','$std','$imagename')";

     $run = mysqli_query($conn,$qry);

     if($run){
        echo "<script>alert('Student data inserted sucessfully')</script>";
     }
     else{
        echo "<script>alert('Something wrong please Try again')</script>";
     }
}
?>