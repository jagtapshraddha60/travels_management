<?php

session_start();

if(!isset($_SESSION['user_id']))
{

header("location:login.php");

exit();

}

?>


<!DOCTYPE html>

<html>

<head>

<title>
Payment Successful | Travel World
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body
{

background:#f8f9fa;

font-family:Arial;

}



.success-box
{

width:450px;

margin:100px auto;

background:white;

padding:40px;

border-radius:20px;

text-align:center;

box-shadow:0 5px 20px #ccc;

}



.success-icon
{

font-size:70px;

color:green;

}


</style>


</head>


<body>



<div class="success-box">


<div class="success-icon">

✔

</div>



<h1 class="text-success">

Payment Successful

</h1>



<h4>

Thank You For Booking With Travel World 🌍

</h4>



<p>

Your tour booking has been confirmed.

</p>



<a href="logout.php"
class="btn btn-danger mt-3">

Logout

</a>



</div>



</body>


</html>