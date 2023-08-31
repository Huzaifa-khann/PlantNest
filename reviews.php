<?php

include 'config.php';

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<!-- Start Header Section -->


<body>
    <header class="header">

        <div class="flex">

            <a href="admin_page.php" class="logo">Plant<span>Nest</span></a>

            <nav class="navbar">
                <a href="home.php">Home</a>
                <a href="Accessories.php">Accessories</a>
                <a href="orders.php">Orders</a>
                <a href="shop.php">Plants Catalog</a>
                <a href="about.php">About</a>
                <a href="reviews.php">Reviews</a>
                <a href="contact.php">Message</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="search_page.php" class="fas fa-search"></a>
            </div>

            <div class="profile">
            </div>

        </div>

        <!-- End Header Section -->


        <?php

        // Handle review submission
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];

            // Insert review into the database using prepared statement
            $sql = "INSERT INTO reviews (name, rating, comment) VALUES (:name, :rating, :comment)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':comment', $comment);

            try {
                $stmt->execute();
                echo '<script>alert("Review submitted successfully!")</script>';
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>

<!-- Start Customer Review Section -->

        <style>
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f4f4f4;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                background-color: #fff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            label {
                font-weight: bold;
                margin-bottom: 8px;
                display: block;
            }

            input[type="text"],
            select,
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-bottom: 15px;
            }

            textarea {
                resize: vertical;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
        </head>

        <body>
            <div class="container">
                <h1>Add Review</h1>
                <form method="post">
                    <label for="name">Name:</label>
                    <input type="text" name="name" required>
                    <label for="rating">Rating:</label>
                    <select name="rating" required>
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                    </select>
                    <label for="comment">Comment:</label>
                    <textarea name="comment" rows="4" required></textarea>
                    <input type="submit" name="submit" value="Submit Review">
                </form>
            </div>
            <!-- End Customer Review Section -->
        </body>

        </html>
        <?php include 'footer.php'; ?>

        <script src="js/script.js"></script>
</body>

</html>