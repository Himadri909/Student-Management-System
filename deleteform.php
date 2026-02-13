<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: ../login.php');
    exit;
}

include('../dbcon.php');


if(!isset($_GET['id'])){
    die("ID missing");
}

$id = $_GET['id'];


$qry = "DELETE FROM student WHERE id='$id'";
$run = mysqli_query($conn,$qry);

if($run){
    echo "<script>
        alert('Student Deleted Successfully');
        window.location='updatestudent.php';
    </script>";
}
else{
    echo "<script>alert('Delete Failed');</script>";
}
?>
