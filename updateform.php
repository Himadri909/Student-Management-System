<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: ../login.php');
    exit;
}

include('header.php');
include('../dbcon.php');

if(!isset($_GET['id'])){
    die("ID not found");
}

$sid = $_GET['id'];

$sql = "SELECT * FROM student WHERE id='$sid'";
$run = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($run);

if(isset($_POST['update'])){

    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std  = $_POST['standard'];

    $qry = "UPDATE student SET
            rollno='$roll',
            name='$name',
            city='$city',
            pcont='$pcon',
            standard='$std'
            WHERE id='$sid'";

    $run2 = mysqli_query($conn,$qry);

    if($run2){
        echo "<script>alert('Student data Updated Successfully');</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}

?>

<div style="text-align:right; margin-top:20px;">
   <a href="admindash.php"
      style="text-decoration:none;background:#2c3e50;color:white;padding:8px 14px;border-radius:6px;">
      ← Admin Dashboard
   </a>
</div>

<h1>Update Student</h1>

<form method="post" class="form-card" enctype="multipart/form-data">

<div class="form-group">
<label>Roll No:</label>
<input type="text" name="rollno"
value="<?php echo $data['rollno']; ?>">
</div>

<div class="form-group">
<label>Full Name:</label>
<input type="text" name="name"
value="<?php echo $data['name']; ?>">
</div>

<div class="form-group">
<label>City:</label>
<input type="text" name="city"
value="<?php echo $data['city']; ?>">
</div>

<div class="form-group">
<label>Parents Contact:</label>
<input type="text" name="pcon"
value="<?php echo $data['pcont']; ?>">
</div>

<div class="form-group">
<label>Standard:</label>
<input type="number" name="standard"
value="<?php echo $data['standard']; ?>">
</div>

<div class="form-group">
<label>Image:</label>
<input type="file" name="simg">
</div>

<input type="submit" name="update" value="Update">

</form>
