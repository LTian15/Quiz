<?PHP 

session_start();


include('connect.php');
if(empty($_POST['id']) or empty($_POST['pass']))
{
    die("<script>alert('Please enter ID Name and Password');
    window.location.href='index.php';</script>");
} 

if(isset($_POST['selection'])) {
if($_POST['selection']=='student')
{
    $jadual     =   "student";
    $medan1     =   "id_student";
    $medan2     =   "pass_student";
    $medan3     =   "name_student";
    $lokasi     =   "student/exercise.php";
}

else if($_POST['selection']=='teacher')
{
    $jadual     =   "teacher";
    $medan1     =   "id_T";
    $medan2     =   "pass_T";
    $medan3     =   "name_T";
    $lokasi     =   "teacher/index.php";
} 
}


$id = mysqli_real_escape_string($conn, $_POST['id']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);


if ($_POST['selection']="teacher") { 
    $jadual = "teacher";
    $medan1 = "id_T";
    $medan2 = "pass_T";
    $medan3 = "name_T";
    $lokasi = "teacher/index.php";
} else if ($_POST['selection']="student"){ 
    $jadual = "student";
    $medan1 = "id_student";
    $medan2 = "pass_student";
    $medan3 = "name_student";
    $lokasi = "student/exercise.php";
} else {
    die("<script>alert('Invalid ID format');
    window.history.back();</script>");
}


$in_login = "SELECT * FROM $jadual WHERE $medan1=? AND $medan2=? LIMIT 1";
$stmt = mysqli_prepare($conn, $in_login);
mysqli_stmt_bind_param($stmt, "ss", $id, $pass);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_array($result);
    $_SESSION[$medan3] = $data[$medan3];
    $_SESSION[$medan1] = $data[$medan1];

    echo "<script>window.location.href='$lokasi';</script>";
}

mysqli_close($conn);
mysqli_stmt_close($stmt);
?>