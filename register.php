<?php

include("db.php");

session_start();


$message="";


if(isset($_POST['register']))
{

$name=$_POST['name'];

$email=$_POST['email'];

$password=$_POST['password'];



$check=mysqli_query($conn,

"SELECT * FROM users WHERE email='$email'"

);



if(mysqli_num_rows($check)>0)
{

$message="Email already exists";

}

else
{


$query=mysqli_query($conn,

"INSERT INTO users
(name,email,password)

VALUES

('$name','$email','$password')"

);



if($query)
{

header("location:login.php");

exit();

}

else

{

$message="Registration Failed";

}


}


}

?>



<!DOCTYPE html>

<html>

<head>

<title>Register | Travel World</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-light">


<div class="container">

<div class="col-md-5 mx-auto mt-5 bg-white p-4 rounded shadow">


<h2 class="text-center">
Create Account
</h2>


<?php echo $message; ?>


<form method="POST">


<input type="text"
name="name"
class="form-control mb-3"
placeholder="Name"
required>


<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>


<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>


<button name="register"
class="btn btn-primary w-100">

Register

</button>


</form>


<a href="login.php">

Already have account? Login

</a>


</div>

</div>


</body>

</html>