<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold Quantity</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>


<?php include 'admin_header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 70%;
        margin: 20px auto;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>

    <!-- Start Sold Quantity Section -->

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock Available</th>
            <th>Sold Quantity</th>
        </tr>

        <?php

        // Establish database connection using PDO
        
        try {


            // Fetch data from the database
            $sql = "SELECT id, name, stock_available, sold_quantity FROM stock";
            $result = $conn->query($sql);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["stock_available"] . "</td>";
                echo "<td>" . $row["sold_quantity"] . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $conn = null; // Close the connection
        }
        ?>
    </table>

    <!-- End Sold Quantity Section -->

</body>

</html>