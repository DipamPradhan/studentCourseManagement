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
 $fetchStudent = "SELECT * FROM students where studentID = $id"; ;
 $fetchStudentResult = mysqli_query($connection,$fetchStudent);
$studentData = mysqli_fetch_assoc($fetchStudentResult);

 //database
if(isset($_POST['studentSubmit'])){
    // if (isset($_POST['sId']) && !empty(trim($_POST['sId']))) {
    //     while($studentData = mysqli_fetch_assoc($fetchStudentResult)){
    //         if($studentData['studentID']===$_POST['sId']){
    //             $errors['sId'] = "Student ID already exists";
    //             $isValid = false;
    //         }
    //     }
    //     if (!preg_match('/^[1-9][0-9]*$/', $_POST['sId'])) {
    //         $errors['sId'] = "Student ID must be a positive number ";
    //         $isValid = false;
    //     } else {
    //         $studentID = $_POST['sId'];
    //     }
    // } else {
    //     $errors['sId'] = "Student ID is Required";
    //     $isValid = false;
    // }
    if(isset($_POST['name'])&&!empty(trim($_POST['name']))){
        $name = $_POST['name'];
    }else{  
        $errors['name'] = "Name is Required";
        $isValid = false;

    }

    if(isset($_POST['email'])&&!empty(trim($_POST['email']))){
         $email = $_POST['email'];
    //     echo preg_match($emailPattern,$_POST['email']);
    //  if(!preg_match($emailPattern,$_POST['email'])){
    //     $errors['emailPattern'] = "Email Pattern Invalid";
    // }
    }else{
        $errors['email'] = "Email is Required";
        $isValid = false;   
        
    }

    if(isset($_POST['number'])&&!empty(trim($_POST['number']))){
        if (!preg_match('/^[0-9]{10}$/', $_POST['number'])) {
            $errors['numberPattern'] = "Number must be a 10-digit numeric value";
            $isValid = false;
        }else{
        $number = $_POST['number'];
        }
    }else{
        $errors['number'] = "Number is Required";

    }


    if(isset($_POST['faculty'])&&($_POST['faculty']!="")){
        $faculty = $_POST['faculty'];
    }else{
        $errors['faculty'] = "Choose a faculty";
        $isValid = false;
    }

    if(isset($_POST['gender'])&&($_POST['gender']!="")){
        $gender = $_POST['gender'];
    }else{
        $errors['gender'] = "Choose a Gender";
        $isValid = false;
        
    }

    // if(isset($_POST['course'])&&!empty(($_POST['course']))){

    //     foreach ($_POST['course'] as $courseID) {
    //         $selectedCourses[] = $courseID;
    //         echo "<pre>";
          
    //         }
    //         print_r($selectedCourses);
        
    // }else{
    //     $errors['course'] = "Choose a Course";
    //     $isValid = false;
        
    // }
    if($isValid){
        echo "Form Submitted";
         $updateSql = "UPDATE  students set
         studentName = '$name',
         email = '$email',
        number = '$number',   
        faculty = '$faculty',
        gender = '$gender'
        WHERE studentID = $id";

        $updateResultStd = mysqli_query($connection,$updateSql);

        // for($i=0;$i<count($selectedCourses);$i++){
        //     $cID = $selectedCourses[$i];
        //     $insertRelation = "INSERT INTO student_courses(studentID,courseID) VALUES
        //     ('$studentID','$cID')";
        //     $insertResultRel = mysqli_query($connection,$insertRelation);
        // }

        if($updateResultStd){
            echo "Student Registered Successfully ";
            header('location:first.php');
        }else{
            echo "Student Could not be Registered ";
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
    <title>Student Registration Form</title>
</head>
<body>
    <form action="" method="POST">
        <!-- <label for="sId">Student ID: </label>
        <input type="text" name="sId" id="sId" placeholder = "Enter your uniqueID">
        <br><br> -->
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder = "Enter your Full Name" value="<?php echo $studentData['studentName']?>">
        <br><br>
        <label for="email">Email: </label>
        <input type="text" name="email" placeholder="Enter your Email" value="<?php echo $studentData['email']?>">
        <br><br>
        <label for="number">Number: </label>
        <input type="text" name="number" placeholder="Enter your Number" value="<?php echo $studentData['number']?>">
        <br><br>
        <label for="faculty">
            <select name="faculty" id="faculty">
                <option value="">Choose Faculty</option>
                <option value="CSIT" <?php echo $studentData['faculty']==='CSIT'?'selected':''; ?>>Bsc.CSIT</option>
                <option value="BCA" <?php echo $studentData['faculty']==='BCA'?'selected':''; ?>>BCA</option>
                <option value="BIM" <?php echo $studentData['faculty']==='BIM'?'selected':''; ?>>BIM</option>
                <option value="BBM" <?php echo $studentData['faculty']==='BBM'?'selected':''; ?>>BBM</option>
            </select>
        </label>
        <br><br>
        <label for="gender">Gender: </label>
        <input type="radio" name="gender" id="male" value = "male" <?php echo $studentData['gender']==='male'?'checked':''; ?>>
        <label for="male" >Male</label>
        <input type="radio" name="gender" id="female" value="female" <?php echo $studentData['gender']==='female'?'checked':''; ?>>
        <label for="female" name="female">Female</label>
        <br><br>

<br><br>
        <input type="submit" name="studentSubmit" value="Edit Student">
        <input type="button" value="Cancel" onclick="window.location.href='first.php'">
    </form> 


</body>
</html>