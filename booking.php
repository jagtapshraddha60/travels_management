<?php

include("db.php");

session_start();


if(!isset($_SESSION['user_id']))
{

header("location:login.php");

exit();

}



$package="";


if(isset($_GET['package']))
{

$package=$_GET['package'];

}



$message="";



if(isset($_POST['book']))
{


$name=$_POST['name'];

$email=$_POST['email'];

$mobile=$_POST['mobile'];

$package=$_POST['package'];

$persons=$_POST['persons'];

$travel_date=$_POST['travel_date'];

$user_id=$_SESSION['user_id'];



$insert=mysqli_query($conn,


"INSERT INTO bookings

(name,email,mobile,package,persons,travel_date,status,payment_status,user_id)

VALUES

('$name','$email','$mobile','$package','$persons','$travel_date','Pending','Pending','$user_id')"

);



if($insert)
{

header("location:payment.php");

exit();

}

else
{

$message="Booking Failed";

}


}


?>


<!DOCTYPE html>

<html>

<head>

<title>

Booking | Travel World

</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<style>


body
{

background:#f8f9fa;

font-family:Arial;

}



.booking-box
{

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px #ccc;

}



.map-box iframe
{

border-radius:20px;

}



</style>


</head>



<body>


<nav class="navbar navbar-dark bg-dark">


<div class="container">


<a class="navbar-brand">

🌍 Travel World

</a>



<a href="logout.php" class="btn btn-danger">

Logout

</a>


</div>


</nav>



<div class="container mt-5">


<div class="row">



<div class="col-md-6">


<div class="booking-box">


<h2 class="text-center">

📝 Booking Form

</h2>


<?php

if($message!="")
{

echo "<div class='alert alert-danger'>$message</div>";

}

?>

<form method="POST">


<label>
Name
</label>

<input type="text"
name="name"
class="form-control mb-3"
placeholder="Enter Your Name"
required>



<label>
Email
</label>

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Enter Your Email"
required>




<label>
Mobile Number
</label>

<input type="text"
name="mobile"
class="form-control mb-3"
placeholder="Enter Mobile Number"
required>




<label>
Package
</label>

<input type="text"
name="package"
class="form-control mb-3"
value="<?php echo $package; ?>"
readonly>




<label>
Number Of Persons
</label>

<input type="number"
name="persons"
class="form-control mb-3"
placeholder="Enter Persons"
min="1"
required>




<label>
Travel Date
</label>

<input type="date"
name="travel_date"
class="form-control mb-3"
required>




<button type="submit"
name="book"
class="btn btn-success w-100">

Confirm Booking

</button>



</form>


</div>

</div>



<!-- RIGHT SIDE MAP -->


<div class="col-md-6">


<div class="booking-box map-box">


<h3 class="mb-3">

🗺️ <?php echo $package; ?> Location

</h3>



<iframe

src="https://www.google.com/maps?q=<?php echo $package; ?>&output=embed"

width="100%"

height="450"

style="border:0;">

</iframe>



</div>


</div>



</div>


</div>



</body>

</html>