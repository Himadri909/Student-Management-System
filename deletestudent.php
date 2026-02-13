<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: ../login.php');
    exit;
}

include('header.php');
include('../dbcon.php');
?>

<div style="text-align:right; margin-top:20px;">
   <a href="admindash.php"
      style="text-decoration:none;background:#2c3e50;color:white;padding:8px 14px;border-radius:6px;">
      ← Admin Dashboard
   </a>
</div>

<form class="form-card" method="post">
    <div class="form-group">
        <label>Enter Standard</label>
        <input type="number" name="standard" required>
    </div>

    <div class="form-group">
        <label>Enter Student Name</label>
        <input type="text" name="stuname" required>
    </div>

    <input type="submit" name="submit" value="Search">
</form>


<table class="student-table">
<tr>
    <th>Id</th>
    <th>Image</th>
    <th>Name</th>
    <th>Roll No</th>
    <th>Edit</th>
</tr>

<?php
if(isset($_POST['submit'])){

    $standard = $_POST['standard'];
    $name = $_POST['stuname'];

    $sql = "SELECT * FROM student
            WHERE standard='$standard'
            AND name LIKE '%$name%'";

    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) < 1){
        echo "<tr><td colspan='5'>No Record Found</td></tr>";
    }
    else{
        $count = 0;
        while($data = mysqli_fetch_assoc($run)){
            $count++;
?>

<tr>
<td><?php echo $count; ?></td>

<td>
<img src="../dataimg/<?php echo $data['image']; ?>" class="stu-img">
</td>

<td><?php echo $data['name']; ?></td>
<td><?php echo $data['rollno']; ?></td>

<td>
<a class="btn-delete" href="deleteform.php?id=<?php echo $data['id']; ?>">
Delete
</a>
</td>

</tr>

<?php
        }
    }
}
?>

</table>
