<?php
$connection = mysqli_connect('localhost','root','','school');
$fetchquery = "SELECT * from students";

$query = mysqli_query($connection,$fetchquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>StudentID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Faculty</th>
            <th>Gender</th>
            <th>Actions</th>
            <?php while($std = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $std['studentID']; ?></td>
                    <td><?php echo $std['studentName']; ?></td>
                    <td><?php echo $std['email']; ?></td>
                    <td><?php echo $std['number']?></td>
                    <td><?php echo $std['faculty']; ?></td>
                    <td><?php echo $std['gender']?></td>
                    <td><a href="editStudent.php?id=<?php echo $std['studentID']?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tr>
    </table>
</body>
</html>