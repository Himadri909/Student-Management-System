<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: ../login.php');
    exit;
}

include('header.php');
?>

<div class="dashboard-box">

<h2 style="margin-top:40px;">Welcome to Admin Dashboard</h2>

<table class="menu-table">
<tr><td>1.</td><td><a href="addstudent.php">Insert Student Details</a></td></tr>
<tr><td>2.</td><td><a href="updatestudent.php">Update Student Details</a></td></tr>
<tr><td>3.</td><td><a href="deletestudent.php">Delete Student Details</a></td></tr>
</table>

</div>
