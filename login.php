<?php

include("db.php");

session_start();


$message="";


if(isset($_POST['login']))
{

$email=$_POST['email'];

$password=$_POST['password'];



if($email=="shraddha123@gmail.com" && $password=="12345")
{


$_SESSION['user_id']=1;

$_SESSION['user_name']="Shraddha";


header("location:index.php");

exit();


}

else
{

$message="Invalid Email or Password";

}


}


?>



<!DOCTYPE html>

<html>

<head>


<title>
Login | Travel World
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>


body
{

margin:0;

height:100vh;

background:

linear-gradient(
rgba(0,0,0,0.5),
rgba(0,0,0,0.5)
),

url("https://images.unsplash.com/photo-1544620347-c4fd4a3d5957");


background-size:cover;

background-position:center;

display:flex;

align-items:center;

justify-content:center;

font-family:Arial;

}



.login-box
{

width:400px;

background:white;

padding:35px;

border-radius:20px;

box-shadow:0px 5px 20px rgba(0,0,0,0.4);

}



h2
{

text-align:center;

font-weight:bold;

}



</style>


</head>



<body>



<div class="login-box">


<h2>

🚌 Travel World Login

</h2>



<?php

if($message!="")
{

echo "<div class='alert alert-danger'>$message</div>";

}

?>



<form method="POST">



<div class="mb-3">

<label>Email</label>


<input type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>


</div>




<div class="mb-3">


<label>Password</label>


<input type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>


</div>




<button class="btn btn-primary w-100"
name="login">

Login

</button>



</form>



<div class="text-center mt-3">

Don't have account?

<a href="register.php">

Register

</a>


</div>



</div>



</body>

</html>