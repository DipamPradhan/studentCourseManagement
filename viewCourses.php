<?php
$connection = mysqli_connect('localhost','root','','school');
$fetchquery = "SELECT * from courses";
$query = mysqli_query($connection,$fetchquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Records</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Course Duration</th>
            <th>Actions</th>
            <?php while($crs = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $crs['courseID'] ?></td>
                    <td><?php echo $crs['courseName']; ?></td>
                    <td><?php echo $crs['courseDuration']; ?></td>
                    <td><a href="editCourse.php?id=<?php echo $crs['courseID'] ?>">Edit</a></td>
                </tr>
            <?php } ?>
        </tr>
    </table>
</body>
</html>