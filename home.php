<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}
;

if (isset($_POST['add_to_wishlist'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_wishlist_numbers->rowCount() > 0) {
      $message[] = 'already added to wishlist!';
   } elseif ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if (isset($_POST['add_to_cart'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if ($check_wishlist_numbers->rowCount() > 0) {
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <!-- Start Home Section -->

   <div class="home-bg">

      <section class="home">
         <div class="content">
            <span>PlantNest: Your Ultimate Plant Shop</span>
            <h3>Discover a world of natural beauty at PlantNest</h3>
            <p>Welcome to PlantNest, where every leaf tells a story, and every corner blooms with life. Explore our
               botanical haven and bring nature's beauty into your world</p>
            <a href="about.php" class="btn">about us</a>
         </div>

      </section>

   </div>

   <!-- End Home Section -->


   <!-- Start Plants Category Section -->

   <section class="home-category">

      <h1 class="title">Plants Category</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/cat-1.png" alt="">
            <h3>Flowering</h3>
            <p>Vibrant petals dance, painting the air with hues of nature's grace. Each bloom tells a story of life's
               fleeting beauty.</p>
            <a href="category.php?category=Flowering" class="btn">Flowering</a>
         </div>

         <div class="box">
            <img src="images/cat-2.png" alt="">
            <h3>Non-flowering</h3>
            <p>Lush foliage thrives, a testament to nature's enduring vitality, where blossoms shy away but greenery
               perseveres.</p>
            <a href="category.php?category=Non-flowering" class="btn">Non-flowering</a>
         </div>

         <div class="box">
            <img src="images/cat-3.png" alt="">
            <h3>Indoor</h3>
            <p>Bringing nature's serenity indoors, these plants adorn spaces with tranquil green elegance, creating a
               soothing sanctuary within walls.</p>
            <a href="category.php?category=Indoor" class="btn">Indoor</a>
         </div>

         <div class="box">
            <img src="images/cat-4.png" alt="">
            <h3>Outdoor</h3>
            <p>Basking in the sunlight, outdoor plants stand as vibrant guardians of the open landscape, adding bursts
               of color and life to nature's grand canvas.</p>
            <a href="category.php?category=Outdoor" class="btn">Outdoor </a>
         </div>
         <div class="box">
            <img src="images/cat-5.png" alt="">
            <h3>Succulents</h3>
            <p>Succulents thrive with captivating resilience, their fleshy leaves storing secrets of arid lands, adding
               a touch of enchanting minimalism to any setting.</p>
            <a href="category.php?category=Succulents" class="btn">Succulents</a>
         </div>
         <div class="box">
            <img src="images/cat-6.png" alt="">
            <h3>Medicinal</h3>
            <p>In the embrace of these medicinal plants, ancient herbal wisdom intertwines with holistic wellness. With
               leaves that rustle remedies and flowers that hold healing secrets, they stand as nature's of health,
               offering a connection to tradition and a path to rejuvenation.</p>
            <a href="category.php?category=Medicinal" class="btn">Medicinal</a>
         </div>

      </div>

   </section>

   <!-- End Plants Category Section -->

   <!-- Start Latest products Section -->

   <section class="products">

      <h1 class="title">Latest products</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <form action="" class="box" method="POST">
                  <div class="price">$<span>
                        <?= $fetch_products['price']; ?>
                     </span>/-</div>
                  <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  <div class="name">
                     <?= $fetch_products['name']; ?>
                  </div>
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
                  <input type="number" min="1" value="1" name="p_qty" class="qty">
                  <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                  <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               </form>
               <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>

   <!-- End Latest products Section -->






   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>