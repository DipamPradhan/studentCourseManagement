<?php

session_start();

if(!isset($_SESSION['adminID'])) {
    header('location: login.php');
    exit;
}

// if(!isset($_COOKIE['name'])) {
//     header('location: student-login.php');
//     exit;
// }

// Logout action
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();

    // Destroy session using cookie
    // $expiry = time() - 60; // Set past time to destroy the cookie
    // setcookie('name', '', $expiry);

    // Redirect to login page after logout
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Welcome to Student Course Management System</h1>
      <form action="" method="POST">      <input type="submit" name="logout" value="Logout" /></form>


      <div class="linkContainer">
        <div class="links">
          <button id="enrollment">Enroll Student</button>
          <button id="addCourse">Add Course</button>
          <button id="addStudent">Add Student</button>
          <button id="viewCourses">View Courses</button>
          <button id="viewStudents">View Students</button>
          <button id="viewEnrollments">View Enrollments</button>
        </div>
      </div>

      <div class="functionContainer" id="functionContainer">
        <div class="functions">
          <!-- Enrollment Section -->
          <div id="enrollmentDiv" class="functionUsage">
            <h4>Enrollment</h4>
            <div class="enrollment">
              <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\enrollment.php'; ?>
            </div>
          </div>

          <!-- Add Course Section -->
          <div id="addCourseDiv" class="functionUsage">
            <h4>Add Course</h4>
            <div class="addCourse">
              <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\course.php'; ?>
            </div>
          </div>

          <!-- Add Student Section -->
          <div id="addStudentDiv" class="functionUsage">
            <h4>Add Student</h4>
            <div class="addStudent">
              <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\student.php'; ?>
            </div>
          </div>

          <!-- View Courses Section -->
          <div id="viewCoursesDiv" class="functionUsage">
            <h4>View Courses</h4>
            <div class="viewCourses">
              <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\viewCourses.php'; ?>
            </div>
          </div>

          <!-- View Students Section -->
          <div id="viewStudentsDiv" class="functionUsage">
            <h4>View Students</h4>
            <div class="viewStudents">
              <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\viewStudents.php'; ?>
            </div>
          </div>

          <!-- View Enrollments Section -->
          <div id="viewEnrollmentsDiv" class="functionUsage">
            <h4>View Enrollments</h4>
            <div class="viewEnrollments">
            <?php include 'C:\xampp\htdocs\DipamPradhan\studentCourseMang\viewEnrollments.php'; ?>
            </div>
          </div>
        </div>
      </div>
 
      <!-- Default Message when no options are selected -->
      <div id="unclicked">
        <p>Please Choose Options from above to use</p>
      </div>
    </div>
    <script src="scriptHome.js">
    </script>
  </body>
</html>
