<?php

session_start();

if(!isset($_SESSION['studentID'])) {
    header('location: login.php');
    exit;
}


// Logout action
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    header('location: login.php');
    exit;
}

?>
<h1>Hi, <?php echo $_SESSION['name']; ?> !!</h1>
<form action="" method="POST">
    <input type="submit" name="logout" value="Logout" />
</form>