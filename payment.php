<?php

include("db.php");

session_start();


if(!isset($_SESSION['user_id']))
{

header("location:login.php");

exit();

}


$user_id=$_SESSION['user_id'];



?>


<!DOCTYPE html>

<html>

<head>

<title>
Payment | Travel World
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<style>

body
{
background:#f8f9fa;
font-family:Arial;
}



.payment-box
{

width:450px;

margin:80px auto;

background:white;

padding:35px;

border-radius:20px;

box-shadow:0px 5px 20px #ccc;

}


</style>


</head>



<body>


<div class="payment-box">


<h2 class="text-center">

💳 Payment

</h2>



<form method="POST" action="payment_success.php">


<label>

Payment Method

</label>


<select name="method" class="form-control mb-3">


<option>
UPI
</option>


<option>
Debit Card
</option>


<option>
Credit Card
</option>


<option>
Net Banking
</option>


</select>


<button class="btn btn-success w-100">

Pay Now

</button>



</form>

</div>


</body>

</html>