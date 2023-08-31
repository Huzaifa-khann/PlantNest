<style>
    body {
        font-family: "Oxygen", sans-serif;
        color: #050505;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .main {
        max-width: 1200px;
        margin: 0 auto;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards_item {
        display: flex;
        padding: 1rem;
    }

    .card_image {
        position: relative;
        max-height: 250px;
    }

    .card_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card_price {
        position: absolute;
        bottom: 8px;
        right: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 45px;
        height: 45px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 18px;
        font-weight: 700;
    }

    .card_price span {
        font-size: 12px;
        margin-top: -2px;
    }

    .note {
        position: absolute;
        top: 8px;
        left: 8px;
        padding: 4px 8px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 14px;
        font-weight: 700;
    }

    @media (min-width: 40rem) {
        .cards_item {
            width: 50%;
        }
    }

    @media (min-width: 56rem) {
        .cards_item {
            width: 33.3333%;
        }
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .card_content {
        position: relative;
        padding: 16px 12px 32px 24px;
        margin: 16px 8px 8px 0;
        max-height: 290px;
        overflow-y: scroll;
    }

    .card_content::-webkit-scrollbar {
        width: 8px;
    }

    .card_content::-webkit-scrollbar-track {
        box-shadow: 0;
        border-radius: 0;
    }

    .card_content::-webkit-scrollbar-thumb {
        background: #c89b3f;
        border-radius: 15px;
    }

    .card_title {
        position: relative;
        margin: 0 0 24px;
        padding-bottom: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }

    .card_title::after {
        position: absolute;
        display: block;
        width: 50px;
        height: 2px;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #c89b3f;
        content: "";
    }

    hr {
        margin: 24px auto;
        width: 50px;
        border-top: 2px solid #c89b3f;
    }

    .card_text p {
        margin: 0 0 24px;
        font-size: 14px;
        line-height: 1.5;
    }

    .card_text p:last-child {
        margin: 0;
    }

    /* Style for the buttons container */
    .buttons {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Common styles for both buttons */
    .buttons a {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        border: 2px solid #333;
        border-radius: 5px;
        color: #333;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    }

    /* Style for the "buy now" button */
    .buttons .buy {
        background-color: #ff9900;
    }

    .buttons .buy:hover {
        background-color: #ffbf33;
        color: #fff;
        border-color: #ffbf33;
    }

    /* Style for the "add to cart" button */
    .buttons .cart {
        background-color: #337ab7;
        color: #fff;
    }

    .buttons .cart:hover {
        background-color: #449dff;
        border-color: #449dff;
    }
</style>

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
    <title>Accessories</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <?php include 'header.php'; ?>
    <!-- partial:index.partial.html -->

    <!-- Start Card Section -->

    <div class="main">
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image">
                        <img src="images/acc-1.jpg" alt="mixed vegetable salad in a mason jar." />
                        <span class="card_price"><span>$</span>9</span>
                    </div>
                    <div class="card_content">
                        <h2 class="card_title">Pots for Houseplants</h2>
                        <div class="card_text">
                            <p>Plastic and fiberglass pots don't need to be watered as frequently as clay. Other
                                materials for houseplant containers include metal, basketry, treated or rot-resistant
                                wood, glazed pottery, and glass glazed pottery, and glass.
                            </p>
                            <div class="buttons">
                                <a href="checkout.php" class="buy">Buy Now</a>
                                <a href="shop.php" class="cart">Add To Card</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="cards_item">
                <div class="card">
                    <div class="card_image">
                        <img src="images/acc-2.jpg" alt="a Reuben sandwich on wax paper." />
                        <span class="card_price"><span>$</span>18</span>
                    </div>
                    <div class="card_content">
                        <h2 class="card_title">Plant Tables & Shelves</h2>
                        <div class="card_text">
                            <p>Plant tables and shelves are the perfect fusion of functionality and aesthetics for any
                                plant enthusiast. These versatile pieces of furniture provide a dedicated natural beauty
                                to your home or workspace.
                            </p>
                            <div class="buttons">
                                <a href="checkout.php" class="buy">Buy Now</a>
                                <a href="shop.php" class="cart">Add To Card</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="cards_item">
                <div class="card">
                    <div class="card_image">
                        <span class="note">SALE</span>
                        <img src="images/acc-3.jpg" alt="A side view of a plate of figs and berries." />
                        <span class="card_price"><span>$</span>16</span>
                    </div>
                    <div class="card_content">
                        <h2 class="card_title">Watering Cans</h2>
                        <div class="card_text">
                            <p>Watering cans are essential companions for anyone who tends to plants, whether they're
                                potted indoors or flourishing in outdoor gardens. These humble yet indispensable tools
                                bridge the gap between you and your plants.
                            </p>
                            <div class="buttons">
                                <a href="checkout.php" class="buy">Buy Now</a>
                                <a href="shop.php" class="cart">Add To Card</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- End Card Section -->

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>