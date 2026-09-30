<?php

include("db.php");

session_start();


if(!isset($_GET['id']))
{

header("location:packages.php");

exit();

}


$id=$_GET['id'];



$result=mysqli_query($conn,

"SELECT * FROM packages WHERE id='$id'"

);



$row=mysqli_fetch_assoc($result);



if(!$row)
{

header("location:packages.php");

exit();

}




$images=array(

"Goa" => "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2",

"Kashmir" => "https://choiceholidaysindia.com/images/kashmir_2.jpg",

"Mumbai" => "https://images.unsplash.com/photo-1570168007204-dfb528c6958f",
"Konkan" => "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b",
"Alibag" => "https://images.unsplash.com/photo-1507525428034-b723cf961d3e",

"Jaipur" => "https://images.unsplash.com/photo-1477587458883-47145ed94245",

"Manali" => "https://images.unsplash.com/photo-1626621341517-bbf3d9990a23",

"Rajasthan" => "https://images.unsplash.com/photo-1599661046289-e31897846e41",

"Rishikesh" => "https://assets.planyourpackage.com/packages/the-adrenaline-seeker/pack_zipline.webp",

);



$image="https://via.placeholder.com/600x400";



foreach($images as $key=>$value)

{

if(stripos($row['location'],$key)!==false)

{

$image=$value;

break;

}

}


?>


<!DOCTYPE html>

<html>

<head>


<title>

<?php echo $row['package_name']; ?>

</title>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<style>


body
{

background:#f8f9fa;

font-family:Arial;

}


.navbar-brand
{

font-size:25px;

font-weight:bold;

}



.box
{

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px #ccc;

}



.main-img
{

width:100%;

height:400px;

object-fit:cover;

border-radius:15px;

}



.rating
{

color:#ffc107;

font-size:25px;

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


<div class="box">


<div class="row">


<div class="col-md-6">


<img src="<?php echo $image; ?>" class="main-img">


</div>

<div class="col-md-6">


<h1>

<?php echo $row['package_name']; ?>

</h1>



<h5>

📍 <?php echo $row['location']; ?>

</h5>



<p>

🏷️ Category:

<b>
<?php echo $row['category']; ?>
</b>

</p>



<p>

⏳ Duration:

<b>
<?php echo $row['duration']; ?>
</b>

</p>




<div class="rating">

<?php


for($i=1;$i<=5;$i++)

{

if($i <= $row['rating'])

echo "★";

else

echo "☆";

}


?>

</div>




<h2 class="text-success">

₹ <?php echo $row['price']; ?>

</h2>




<p>

<?php echo $row['description']; ?>

</p>




<a href="booking.php?package=<?php echo $row['package_name']; ?>"
class="btn btn-success btn-lg">

📝 Book Now

</a>



</div>


</div>



<hr>



<h3>

📌 Nearby Places

</h3>


<p>

<?php echo $row['nearby_places']; ?>

</p>




<hr>


<h3>

🗺️ Package Location

</h3>



<?php


if(!empty($row['map_location']))

{

echo $row['map_location'];

}

else

{

?>


<iframe

src="https://www.google.com/maps?q=<?php echo $row['location']; ?>&output=embed"

width="100%"

height="350"

style="border:0;border-radius:15px;">

</iframe>


<?php

}

?>




<hr>



<h3>

📍 Live Current Location

</h3>



<button onclick="getLiveLocation()"
class="btn btn-primary mb-3">

Show My Location

</button>



<div id="live_map"

style="width:100%;height:350px;border-radius:15px;">

</div>




<script>


function getLiveLocation()

{


if(navigator.geolocation)

{


navigator.geolocation.watchPosition(showLocation);


}

else

{


alert("Location not supported");

}


}



function showLocation(position)

{


let lat = position.coords.latitude;

let lon = position.coords.longitude;



document.getElementById("live_map").innerHTML=


`

<iframe

width="100%"

height="350"

style="border:0;border-radius:15px"

src="https://www.google.com/maps?q=${lat},${lon}&output=embed">

</iframe>

`;



}



</script>



</div>


</div>



<footer class="bg-dark text-white text-center p-3 mt-5">

🌍 Travel World | Tour & Travel Management System

</footer>



</body>

</html>