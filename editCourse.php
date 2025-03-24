<?php


$connection = mysqli_connect('localhost','root','','school');

if(!$connection){
   die('Database connection error!');
}else{
   echo 'Database connection successfull';
}
//  $emailPattern = '/^[\w-\.]+@([\w-]+\.)+[\w-]$/';

$id = $_GET['id'];
 $errors = array();
 $isValid = true;

 $fetchCourses = "SELECT * from courses";
 $fetchCoursesResult = mysqli_query($connection,$fetchCourses);

$fetchCourseId = "SELECT * FROM courses where courseID = $id"; ;
$fetchCourseIdResult = mysqli_query($connection,$fetchCourseId);
$courseData = mysqli_fetch_assoc($fetchCourseIdResult);

 



if(isset($_POST['courseSubmit'])){

    while($row=mysqli_fetch_assoc($fetchCoursesResult)){
        if($row['courseName']===$_POST['courseName'] &&$row['courseDuration']===$_POST['courseDuration']){
            echo "Course already exists";
            $isValid = false;
        }
    }
    if(isset($_POST['courseName'])&&!empty(trim($_POST['courseName']))){
        $courseName = $_POST['courseName'];
    }else{  
        $errors['courseName'] = "Course Name is Required";
        $isValid = false;

    }

    if(isset($_POST['courseDuration'])&&!empty(trim($_POST['courseDuration']))){
        if (!preg_match('/^\d+(\.\d+)?$/', $_POST['courseDuration'])) {
            $errors['courseDuration'] = "Course Duration must be a valid decimal number";
        } else {
            $courseDuration = $_POST['courseDuration'];
        }
    }else{
        $errors['courseDuration'] = "Course Duration is Required";
        $isValid = false;   

    }

    if($isValid){
        echo "Form Submitted";
        $query = "UPDATE courses SET courseName = '$courseName', courseDuration = '$courseDuration' WHERE courseID = $id";
        $result = mysqli_query($connection,$query);

        if($result){
            echo "Course Edited Successfully";
            header('Location:first.php');
        }else{
            echo "Course Edit Failed";
        }
    }else{
        print_r($errors);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
</head>
<body>
    <form action="" method="POST">
        <label for="courseName">Course Name: </label>
        <input type="text" name="courseName" id="courseName" placeholder = "Enter Course Name" value="<?php echo $courseData['courseName'] ?>">
        <br><br>
        <label for="courseDuration">Course Duration: </label>
        <input type="text" name="courseDuration" id="courseDuration" placeholder = "Duration(in Hours)" value="<?php echo $courseData['courseDuration'] ?>">
        <br><br>
        <input type="submit" name="courseSubmit" id="submit" value="Edit Course"> 
        <input type="button" value="Cancel" onclick="window.location.href='first.php'">
    </form>    
</body>
</html>