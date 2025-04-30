<?php 

session_start();
include('connect.php');

if (empty($_POST['id']) || empty($_POST['pass'])) {
    die("<script>alert('Please enter ID and Password'); window.location.href='index.php';</script>");
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$pass = $_POST['pass'];

// Check in student table
$query = "SELECT * FROM student WHERE id_student = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("<script>alert('Query preparation failed: " . mysqli_error($conn) . "'); window.history.back();</script>");
}

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    
    if ($pass === $data['pass_student']) { // Change to password_verify($pass, $data['pass_student']) if hashed
        session_regenerate_id(true);
        $_SESSION['name_student'] = $data['name_student'];
        $_SESSION['id_student'] = $data['id_student'];
        
        echo "<script>window.location.href='student/exercise.php';</script>";
        exit();
    }
}

mysqli_stmt_close($stmt); // Close statement before reusing

// Check in teacher table
$query = "SELECT * FROM teacher WHERE id_T = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die("<script>alert('Query preparation failed: " . mysqli_error($conn) . "'); window.history.back();</script>");
}

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    
    if ($pass === $data['pass_T']) { // Change to password_verify($pass, $data['pass_T']) if hashed
        session_regenerate_id(true);
        $_SESSION['name_T'] = $data['name_T'];
        $_SESSION['id_T'] = $data['id_T'];
        
        echo "<script>window.location.href='teacher/index.php';</script>";
        exit();
    }
}

die("<script>alert('Invalid ID or Password'); window.history.back();</script>");

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
