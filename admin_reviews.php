<?php

@include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .review {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .review p {
            margin: 5px 0;
        }

        .review strong {
            font-weight: bold;
        }
    </style>

    <!-- Start Fetch Customer Reviews Section -->

    <body>
        <div class="container">
            <h1>Customer Reviews</h1>

            <?php
            // Fetch existing reviews
            $sql = "SELECT id, name, rating, comment FROM reviews ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo "<div class='review'>";
                    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
                    echo "<p><strong>Rating:</strong> " . $row['rating'] . " stars</p>";
                    echo "<p><strong>Comment:</strong> " . $row['comment'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No reviews yet.";
            }
            ?>
        </div>

        <!-- End Fetch Customer Reviews Section -->

    </body>

</html>