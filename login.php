<?php
session_start();

// Check if user is already logged in (using session)
if (isset($_SESSION['studentID'])) {
    header('location: welcome.php');
    exit;
}

if (isset($_SESSION['adminID'])) {
    header('location: first.php');
    exit;
}

// Connect to the database
$connection = mysqli_connect('localhost', 'root', '', 'school');

if (!$connection) {
    die('Database connection error!');
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check student credentials
    $fetchStd = "SELECT * FROM students WHERE email='$email' AND password='$password'";
    $fetchResultStd = mysqli_query($connection, $fetchStd);

    // Check admin credentials
    $fetchAdmin = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $fetchResultAdmin = mysqli_query($connection, $fetchAdmin);

    // If student found
    if (mysqli_num_rows($fetchResultStd) == 1) {
        $student = mysqli_fetch_assoc($fetchResultStd);

        // Store user data in session variables
        $_SESSION['studentID'] = $student['studentID'];
        $_SESSION['name'] = $student['studentName'];

        // Redirect to welcome page
        header('location: welcome.php');
        exit;
    }

    // If admin found
    if (mysqli_num_rows($fetchResultAdmin) == 1) {
        $admin = mysqli_fetch_assoc($fetchResultAdmin);

        // Store user data in session variables
        $_SESSION['adminID'] = $admin['adminID'];
        $_SESSION['name'] = $admin['username'];

        // Redirect to admin page
        header('location: first.php');
        exit;
    }

    // Login failed
    echo "Login failed!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-700 flex items-center justify-center h-screen">
    <div class="rounded-lg shadow-2xl shadow-black w-full max-w-sm mb-10 bg-purple-800 p-10">
        <h1 class="text-3xl font-bold mb-4 text-white">Login</h1>
        
        <form action="" method="POST">

            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2" for="email">Email</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email"
                    type="email"
                    name="email"
                    placeholder="abc@gmail.com"
                    required
                />
            </div>

            <div class="mb-2">
                <label class="block text-white text-sm font-bold mb-2" for="password">Password</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password"
                    type="password"
                    name="password"
                    placeholder="*********"
                    required
                />
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="submit bg-purple-400 hover:bg-purple-600 hover:text-white text-black font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full"
                    type="submit"
                    name="login"
                >
                    Log In
                </button>
            </div>

            <h2 class="text-sm text-center font-bold mt-6 text-white">Create new account?</h2>
            
            <div class="flex items-center justify-between">
                <a
                    href="student.php"
                    class="text-sm text-center font-bold mt-6 text-white bg-purple-600 hover:bg-purple-400 hover:text-black font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full"
                >
                    Sign Up
                </a>
            </div>
        </form>
    </div>
</body>
</html>
