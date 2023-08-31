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
    <title>Availability</title>

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
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    form {
        display: inline-block;
        margin: 0;
    }

    input[type="number"] {
        width: 50px;
        padding: 3px;
    }

    input[type="submit"] {
        padding: 5px 10px;
        background-color: #3498db;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    input[type="submit"]:focus {
        outline: none;
    }
</style>

<body>

    <?php
    // Function to fetch product details
    function getProductDetails()
    {
        global $conn;

        $sql = "SELECT id, name, stock_available FROM stock";
        $stmt = $conn->query($sql);

        $products = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }

    // Fetch product details
    $products = getProductDetails();
    ?>

    <!-- Start Stock Available Table -->

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock Available</th>
            <th>Increment</th>
            <th>Decrement</th>
        </tr>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td>
                    <?php echo $product['id']; ?>
                </td>
                <td>
                    <?php echo $product['name']; ?>
                </td>
                <td>
                    <?php echo $product['stock_available']; ?>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <input type="number" name="incrementQuantity" value="1" min="1">
                        <input type="submit" name="increment" value="Increment">
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <input type="number" name="decrementQuantity" value="1" min="1">
                        <input type="submit" name="decrement" value="Decrement">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Start Stock Available Table -->


    <?php

    @include 'config.php';

    // Function to increment stock
    function incrementStock($productId, $quantity)
    {
        global $conn;

        $sql = "UPDATE stock SET stock_available = stock_available + :quantity WHERE id = :productId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo '<script>alert("Stock incremented successfully")</script>';
        } else {
            echo "Error updating record.";
        }
    }

    // Function to decrement stock
    function decrementStock($productId, $quantity)
    {
        global $conn;

        $sql = "UPDATE stock SET stock_available = GREATEST(0, stock_available - :quantity) WHERE id = :productId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo '<script>alert("Stock decremented successfully")</script>';
        } else {
            echo "Error updating record.";
        }
    }

    ?>
    <?php
    // Handle increment and decrement actions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productId = $_POST["productId"];
        $incrementQuantity = $_POST["incrementQuantity"] ?? 0;
        $decrementQuantity = $_POST["decrementQuantity"] ?? 0;

        if (isset($_POST["increment"])) {
            incrementStock($productId, $incrementQuantity);
        } elseif (isset($_POST["decrement"])) {
            decrementStock($productId, $decrementQuantity);
        }
    }

    // Function to increment stock ... (Same as previous code)
    
    // Function to decrement stock ... (Same as previous code)
    ?>

</body>

</html>