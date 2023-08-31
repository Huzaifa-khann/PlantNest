<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <!-- Start About Section  -->

   <section class="about">

      <div class="row">

         <div class="box">
            <img src="images/about-img-1.png" alt="">
            <h3>Why choose us?</h3>
            <p>Discover the magic of PlantNest – where every plant tells a story, and every choice leads to a
               flourishing connection with the natural world.</p>
            <a href="contact.php" class="btn">Contact us</a>
         </div>

         <div class="box">
            <img src="images/about-img-2.png" alt="">
            <h3>What we provide?</h3>
            <p>At PlantNest, we provide a diverse selection of meticulously curated plants, accompanied by expert
               guidance for successful and rewarding plant care journeys.</p>
            <a href="shop.php" class="btn">Our shop</a>
         </div>

      </div>

   </section>

   <!-- End About Section  -->

   <!-- Start Reivews Section  -->

   <section class="reviews">

      <h1 class="title">Clients reivews</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Syed Anus</h3>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Mahnoor Fatima</h3>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Huzaifa</h3>
         </div>

         <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>ROCK</h3>
         </div>

         <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>ABC</h3>
         </div>

         <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
               amet deserunt aperiam quas ex.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Nimra Noor</h3>
         </div>

      </div>

   </section>

   <!-- End Reivews Section  -->

   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>