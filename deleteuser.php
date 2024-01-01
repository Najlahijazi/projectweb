<?php
session_start();
include("connection.php");

$result = null;

// Check if the form for removing from cart is submitted
if (isset($_POST['deletefromcart'])) {
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : "";

    // Check if 'product_id' is set and not empty
    if (!empty($product_id)) {
        // Delete the product from the cart table
        $query = "DELETE FROM cart WHERE product_id = '$product_id'";
        
        $result = mysqli_query($conn, $query);

        if ($result !== false) {
            echo "Product removed from cart successfully.";
        } else {
            echo "Error removing product from cart: " . mysqli_error($conn);
        }
    } else {
        echo "Please provide the Product ID for removal.";
    }
}
?>
<body>

<div class="container">
    <div class="box form-container">
        <h2 class="heading">Remove Item from Cart</h2>
        <form method="POST" action="">
            <label for="product_id">Product ID:</label>
            <input type="text" name="product_id" id="product_id" required placeholder="Enter Product ID">

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required placeholder="Enter Product Name">

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required placeholder="Enter Product Price">

            <label for="image">Image:</label>
            <input type="text" name="image" id="image" required placeholder="Image">
            
            <button type="submit" name="deletefromcart">Remove from Cart</button>
        </form>
    </div>
</div>

</body>
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
            background-color: var(--red);
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .form-container form button:hover {
            background-color: var(--black);
        }
    </style>
    <title>Cart Management</title>
</head>

</html>
