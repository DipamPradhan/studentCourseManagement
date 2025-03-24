<?php
$connection = mysqli_connect('localhost','root','','school');
if(!$connection){
    die('Database connection error!');
}else{
    echo 'Database connection successfull';
}
$fetchCourse = "SELECT * FROM courses";
$fetchCourseResult = mysqli_query($connection,$fetchCourse);
$fetchStudent = "SELECT * FROM students";
$fetchStudentResult = mysqli_query($connection,$fetchStudent);
$errors = array();
$isValid = true;

$fetchEnrollment = "SELECT * from enrollment";
$fetchEnrollmentResult = mysqli_query($connection,$fetchEnrollment);

if(isset($_POST['enrollmentSubmit'])){
    while($row = mysqli_fetch_assoc($fetchEnrollmentResult)){
        if($_POST['student']===$row['studentID']&&$_POST['course']===$row['courseID']){
            echo "Student Already Enrolled in the class";
            $isValid = false;
        }
    }
    if(isset($_POST['student'])&&!empty(trim($_POST['student']))){
        $studentID = $_POST['student'];
    }else{
        $errors['student'] = "Student is Required";
        $isValid = false;
    }
    if(isset($_POST['course'])&&!empty(trim($_POST['course']))){
        $courseID = $_POST['course'];
    }else{
        $errors['course'] = "Course is Required";
        $isValid = false;
    }
    if($isValid){
        echo "Form Submitted";
        $enrollQuery = "INSERT INTO enrollment(studentID,courseID) VALUES ('$studentID','$courseID')";
        $enrollResult = mysqli_query($connection,$enrollQuery);
        if($enrollResult){
            echo "Student Enrolled Successfully";
        }else{
            echo "Student Enrollment Failed";
        }
    }
    else{
        print_r($errors);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Student</title>
</head>
<body>
    <form action="" method="POST" name="enrollForm">
        <label for="student">Student: </label>
        <select name="student" id="student">
            <option value="">Select Student</option>
            <?php while($student = mysqli_fetch_assoc($fetchStudentResult)){ ?>
                <option value="<?php echo $student['studentID']; ?>"><?php echo $student['studentName']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="course">Course: </label>
        <select name="course" id="course">
            <option value="">Select Course</option>
            <?php while($course = mysqli_fetch_assoc($fetchCourseResult)){ ?>
                <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" name="enrollmentSubmit" value="Enroll" >
    </form>
    <!-- <script>
        
        // enrollForm.forms.addEventListener('submit',function(e){
        //     e.preventDefault();
        //     // enrollForm.submit();
        // });
    </script> -->
</body>
</html>