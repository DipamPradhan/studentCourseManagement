<?php
$connection = mysqli_connect('localhost','root','','school');

if(!$connection){
   die('Database connection error!');
}else{
   echo 'Database connection successfull';
}
//  $emailPattern = '/^[\w-\.]+@([\w-]+\.)+[\w-]$/';
 $errors = array();
 $isValid = true;

 $fetchAdmin = "SELECT * from admin";
 $fetchAdminResult = mysqli_query($connection,$fetchAdmin);

if(isset($_POST['adminSubmit'])){

    while($row=mysqli_fetch_assoc($fetchAdminResult)){
        if($row['username']===$_POST['username']){
            echo $row['username']."Admin is already added";
            $isValid = false;
        }
    }
    if(isset($_POST['username'])&&!empty(trim($_POST['username']))){
        $username = $_POST['username'];
    }else{  
        $errors['username'] = "Admin Name is Required";
        $isValid = false;

    }

    if(isset($_POST['email'])&&!empty(trim($_POST['email']))){
        $email = $_POST['email'];
    }else{
        $errors['email'] = "Email is Required";
        $isValid = false;   

    }

    if(isset($_POST['password'])&&!empty(trim($_POST['password']))){
        $password = $_POST['password'];
    }else{
        $errors['password'] = "Password is Required";
        $isValid = false;
        
    }

    if($isValid){
        echo "Form Submitted";
        $password = md5($password);
        $query = "INSERT INTO admin (username,email,password) VALUES ('$username','$email','$password')";
        $result = mysqli_query($connection,$query);
        if($result){
            echo "Admin Added Successfully";
        }else{
            echo "Admin Addition Failed";
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
    <title>Admin</title>
</head>
<body>
    <form action="" method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" placeholder = "Enter Admin username">
        <br><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder = "Enter Admin email">
        <br><br>

        
        <label for="password">Password: </label>
        <input type="password" name="password" placeholder="********">
        <br><br>
        <input type="submit" name="adminSubmit" id="submit" value="Add Admin"> 
    </form>    
</body>
</html>