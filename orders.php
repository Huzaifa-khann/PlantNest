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
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <!-- Start Place orders Section -->

   <style>
      .cancel-button {
         background-color: #ff3333;
         color: white;
         border: none;
         padding: 5px 10px;
         border-radius: 4px;
         cursor: pointer;
      }

      .order-table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }

      .order-table th,
      .order-table td {
         border: 1px solid #dddddd;
         padding: 8px;
         text-align: left;
      }

      .order-table th {
         background-color: #f2f2f2;
      }
   </style>


   <section class="placed-orders">
      <h1 class="title">Placed Orders</h1>
      <div class="box-container">
         <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if ($select_orders->rowCount() > 0) {
            echo '<table class="order-table">
                     <tr>
                        <th>Placed On</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Your Orders</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                     </tr>';
            while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
               echo '<tr>';
               echo '<td>' . $fetch_orders['placed_on'] . '</td>';
               echo '<td>' . $fetch_orders['name'] . '</td>';
               echo '<td>' . $fetch_orders['number'] . '</td>';
               echo '<td>' . $fetch_orders['email'] . '</td>';
               echo '<td>' . $fetch_orders['address'] . '</td>';
               echo '<td>' . $fetch_orders['method'] . '</td>';
               echo '<td>' . $fetch_orders['total_products'] . '</td>';
               echo '<td>$' . $fetch_orders['total_price'] . '/-</td>';
               echo '<td style="color:' . ($fetch_orders['payment_status'] == 'pending' ? 'red' : 'green') . '">' . $fetch_orders['payment_status'] . '</td>';
               echo '<td>';
               if ($fetch_orders['payment_status'] == 'pending') {
                  echo '<form action="" method="POST">
                           <input type="hidden" name="order_id" value="' . $fetch_orders['id'] . '">
                           <button type="submit" name="cancel_order" class="cancel-button">Cancel Order</button>
                        </form>';
               }
               echo '</td>';
               echo '</tr>';
            }
            echo '</table>';
         } else {
            echo '<p class="empty">No orders placed yet!</p>';
         }

         // Handle the order cancellation logic
         if (isset($_POST['cancel_order'])) {
            $order_id = $_POST['order_id'];

            // Update the payment status to "cancelled" in the database
            $cancel_query = $conn->prepare("UPDATE `orders` SET payment_status = 'order cancelled' WHERE id = ?");
            if ($cancel_query->execute([$order_id])) {
               echo '<script>alert("<p class="success">Order has been cancelled successfully!</p>")</script>';
            } else {
               echo '<p class="error">Failed to cancel the order. Please try again later.</p>';
            }
         }
         ?>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>


   <!-- End Place orders Section -->








   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>