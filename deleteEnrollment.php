
<?php
// Get the student id from URL
$id = $_GET['id'];

// Connect to the database
$connection = mysqli_connect('localhost', 'root', '', 'school');

// Check the connection
if (!$connection) {
    die('Database connection error!');
}

// SQL query to delete a user
$deleteSql = "DELETE FROM enrollment WHERE enrollmentID = $id ";

// Execute query
$deleteResult = mysqli_query($connection, $deleteSql);

// Show success/fail message
if ($deleteResult) {
    echo "Record has been deleted successfully.";
    header("location: first.php");
} else {
    echo "Sorry, Record can not be deleted.";
}
?>