<!DOCTYPE html>
<html>
<?PHP 
session_start(); ?>
	<head>
		<title>MASQuiz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
<style>
.w3-tajuk {
  font-family: "Lobster", Sans-serif;
}
</style>
	</head>
<body>

<div class="w3-container w3-pink">
<h1 class="w3-tajuk w3-jumbo font-effect-shadow-multiple w3-text-black w3-center"><b><i class="fa fa-laptop" aria-hidden="true"></i>  MASQuiz <i class="fa fa-laptop" aria-hidden="true"></i></b></h1>  
  
</div>
<hr>
<?PHP if(!empty ($_SESSION) and basename($_SERVER['PHP_SELF']) != 'index.php'){ ?>
<?php
echo "
<div class='w3-panel w3-center w3-topbar w3-bottombar w3-border-red w3-pale-red'>
    <p style='font-size: large; display: flex; justify-content: space-between;'>
        <span>Student: " . $_SESSION['name_student'] . "</span>
        <span>ID Student: " . $_SESSION['id_student'] . "</span>
    </p>
</div>";
?>

<div class="w3-bar w3-orange">
    <a href='exercise.php' class="w3-bar-item w3-button w3-large">Home</a>
    <a href='../logout.php' class="w3-bar-item w3-button w3-right w3-yellow w3-large">Logout</a>
</div>

</div>
<hr>
<?PHP } ?>
</html>