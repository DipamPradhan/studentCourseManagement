<?php
$connection = mysqli_connect('localhost','root','','school');
$fetchquery = "SELECT students.studentID, students.studentName, students.email, students.number, students.faculty, students.gender, 
    courses.courseName, courses.courseDuration,courses.courseID,enrollment.enrollmentID
    FROM students
    JOIN enrollment ON students.studentID = enrollment.studentID
    JOIN courses ON enrollment.courseID = courses.courseID
";
// $fetchquery = "SELECT students.studentID, students.studentName, students.email, students.number, students.faculty, students.gender, 
//     courses.courseName, courses.courseDuration
//     FROM students
//     JOIN student_courses ON students.studentID = student_courses.studentID
//     JOIN courses ON student_courses.courseID = courses.courseID
//     where courses.courseName = 'Back End'
// ";
$query = mysqli_query($connection,$fetchquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result of Enrollment</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>Enrollment ID</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Faculty</th>
            <th>Gender</th>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Duration</th>
            <th>Actions</th>
            <?php while($std = mysqli_fetch_assoc($query)){ ?>
                <tr>
                    <td><?php echo $std['enrollmentID'] ?></td>
                    <td><?php echo $std['studentID']; ?></td>
                    <td><?php echo $std['studentName']; ?></td>
                    <td><?php echo $std['email']; ?></td>
                    <td><?php echo $std['number']?></td>
                    <td><?php echo $std['faculty']; ?></td>
                    <td><?php echo $std['gender']?></td>
                    <td><?php echo $std['courseID']; ?></td>
                    <td><?php echo $std['courseName']; ?></td>
                    <td><?php echo $std['courseDuration']; ?></td>
                    <td><a href="editEnrollment.php?id=<?php echo $std['enrollmentID']?>">Edit</a>
                    <a href="deleteEnrollment.php?id=<?php echo $std["enrollmentID"]?>"
                    onclick = "return confirm('Are you sure to delete this record')">
                    Delete
                </a</td>
                </tr>
            <?php } ?>
        </tr>
    </table>
</body>
</html>