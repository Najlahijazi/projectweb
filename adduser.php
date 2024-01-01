<?php
session_start();
include("connection.php");

$result = null; // Initialize $result outside the if statement

if (isset($_POST['addtocart'])) {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : "";

    // Check if 'name', 'price', and 'image' are set and not empty
    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['price']) && !empty($_POST['price']) &&
        isset($_POST['image']) && !empty($_POST['image'])
    ) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        // Insert product information into the cart table
        $query = "INSERT INTO cart (product_id, name, price, image) VALUES ('$product_id', '" . mysqli_real_escape_string($conn, $name) . "', '$price', '$image')";

        $result = mysqli_query($conn, $query);

        if ($result !== false) {
            echo "Product added to cart successfully.";
        } else {
            echo "Error adding product to cart: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --blue: #3498db;
            --red: #e74c3c;
            --orange: #f39c12;
            --black: #333;
            --white: #fff;
            --light-bg: #eee;
            --box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            --border: 2px solid var(--black);
        }

        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            background-color: var(--light-bg);
            color: var(--black);
        }

        .container {
            padding: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .box {
            text-align: center;
            border-radius: 5px;
            box-shadow: var(--box-shadow);
            border: var(--border);
            padding: 20px;
            background-color: var(--white);
            width: 100%;
            margin: 50px auto;
        }

        .form-container form label {
            font-size: 20px;
            color: var(--black);
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }

        .form-container form input {
            width: calc(100% - 28px);
            border-radius: 5px;
            border: var(--border);
            padding: 12px 14px;
            font-size: 18px;
            margin: 10px 0;
        }

        .form-container form button {
            display: inline-block;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            color: var(--white);
            border-radius: 25px;
            background-color: var(--blue);
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .form-container form button:hover {
            background-color: var(--black);
        }
    </style>
    <title>Add Product to Cart</title>
</head>
<body>

<div class="container">
    <div class="box form-container">
        <h2 class="heading">Add Product to Cart</h2>
        <form method="POST" action="">
            <label for="product_id">Product ID:</label>
            <input type="text" name="product_id" id="product_id" required placeholder="Enter Product ID">

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required placeholder="Enter Product Name">

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required placeholder="Enter Product Price">

            <label for="image">Image:</label>
            <input type="text" name="image" id="image" required placeholder="Image">

            <button type="submit" name="addtocart">Add to Cart</button>
        </form>
    </div>
</div>

</body>
</html>
