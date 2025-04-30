<!DOCTYPE html>
<html>
<?PHP 

include('connect.php'); 


if(!empty($_POST))
{

    $name           =   mysqli_real_escape_string($conn,$_POST['name']);
    $id          =   mysqli_real_escape_string($conn,$_POST['id']);
    $pass     =   mysqli_real_escape_string($conn,$_POST['pass']);

    if(empty($name) or empty($id) or empty($pass)) {
        die("<script>alert('Please give full Information');
        window.history.back();</script>");
    }

    if(strlen($id)>=10)
    {
        die("<script>alert('ID Fail');
        window.history.back();</script>");
    }
  
  if($_POST['selection']=='student')
{
	$in_save="INSERT INTO student (name_student,id_student,pass_student)
        VALUE ('$name','$id','$pass')";
}
else {
	$in_save="INSERT INTO teacher (name_T,id_T,pass_T)
        VALUE ('$name','$id','$pass')";
}
    
    
    if(mysqli_query($conn,$in_save))
    {
        
        echo "<script>alert('Sign Up Successful.');
        window.location.href='index.php';</script>";
    }
    else
    {
        echo "<script>alert('Sign Up Fail.');
        window.history.back();</script>";
    }
    

}
?>
<body>
<form action='signup.php' method='POST'>
	<div class="main">  

		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" required="">
					<input type="text" name="id" placeholder="ID name" required="">
					<input type="password" name="pass" placeholder="Password" required="">
			<div class="selection">
            <label>
                <input type="radio" name="selection" value="teacher" > Teacher
            </label>
            <label>
                <input type="radio" name="selection" value="student" > Student
            </label>
        </div><br>
					<button>Sign up</button>
					<a href="login.php" style="color: #fff; font-size: 15px; display: block; text-align: center; margin-top: 20px;"> Have an account?  Login</a>
</div>
			</div>
			</form>
</body>
<style>

body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
	margin : 50px auto;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 15px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 10px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 30px auto;
	padding: 12px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;

	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #6d44b8;
}
.login{
	height: 430px;
	background: #eee;
	border-radius: 50% / 10%;
	transform: translateY(-100px);
	transition: .8s ease-in-out;
	margin : 
}
.login label{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-465px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}
#chk:checked ~ .signup label{
	transform: scale(.6);
}
radio {
	
}
.selection{
display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px; 
    color: white;
	font-size : 50%
}
.selection label {
    display: flex;
    align-items: center;
    gap: 5px; 
}
.selection input[type="radio"] {
    width: 16px;
    height: 16px;
    margin: 0;
}

</style>
<?PHP 
mysqli_close($conn);
 ?>