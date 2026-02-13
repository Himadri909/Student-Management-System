<?php
function showDetails($rollno,$standard)
{
    include('dbcon.php');

    $sql = "SELECT * FROM `student` 
            WHERE `rollno`='$rollno' AND `standard`='$standard'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){

        echo "<h2>Student Details</h2>";

        echo "<table class='student-table'>
        <tr>
            <th>Roll No</th>
            <th>Image</th>
            <th>Name</th>
            <th>City</th>
            <th>Parent Contact</th>
            <th>Standard</th>
        </tr>";

        while($data = mysqli_fetch_assoc($run))
        {
            ?>
            <tr>
    
                <td><?php echo $data['rollno']; ?></td>
                <td>
                    <img src="dataimg/<?php echo $data['image']; ?>" class="stu-img">
                </td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['city']; ?></td>
                <td><?php echo $data['pcont']; ?></td>
                <td><?php echo $data['standard']; ?></td>
            </tr>
            <?php
        }

        echo "</table>";
    }
    else{
        echo "<script>alert('No student found')</script>";
    }
}
?>
