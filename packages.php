<?php

include("db.php");

session_start();


$result=mysqli_query($conn,

"SELECT * FROM packages ORDER BY id ASC LIMIT 9"

);



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


?>


<!DOCTYPE html>

<html>

<head>


<title>

Travel World Packages

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



.card
{

border-radius:15px;

overflow:hidden;

box-shadow:0 5px 20px #ccc;

height:100%;

}



.card img
{

height:250px;

width:100%;

object-fit:cover;

}



.rating
{

color:#ffc107;

font-size:22px;

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


<h1 class="text-center mb-5">

🌍 Explore Beautiful Places

</h1>



<div class="row">
    
<?php


while($row=mysqli_fetch_assoc($result))

{


$place=$row['location'];


$image="assets/images/default.jpg";



foreach($images as $key=>$value)

{


if(stripos($place,$key)!==false)

{


$image=$value;

break;


}


}



?>


<div class="col-md-4 mb-4">


<div class="card h-100">



<img src="<?php echo $image; ?>"
class="card-img-top"
alt="Package Image">



<div class="card-body">


<h4>

<?php echo $row['package_name']; ?>

</h4>



<p>

📍 <b>Location:</b>

<?php echo $row['location']; ?>

</p>



<p>

🏷️ <b>Category:</b>

<?php echo $row['category']; ?>

</p>



<p>

⏳ <b>Duration:</b>

<?php echo $row['duration']; ?>

</p>



<div class="rating">


<?php


for($i=1;$i<=5;$i++)

{


if($i <= $row['rating'])

{

echo "★";

}

else

{

echo "☆";

}


}


?>


</div>




<h5 class="text-success">

₹ <?php echo $row['price']; ?>

</h5>



<p>

<?php echo substr($row['description'],0,100); ?>

...

</p>




<a href="package_details.php?id=<?php echo $row['id']; ?>"
class="btn btn-primary">

View Details

</a>



<a href="booking.php?package=<?php echo $row['package_name']; ?>"
class="btn btn-success">

Book Now

</a>



</div>


</div>


</div>



<?php

}


?>


</div>


</div>



<footer class="bg-dark text-white text-center p-3 mt-5">

🌍 Travel World | Tour & Travel Management System

</footer>



</body>

</html>