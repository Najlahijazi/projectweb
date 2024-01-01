<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>
    <div class="container">
        <h2 class="heading">Welcome to our Shop</h2>
        <p class="welcome-message">Modify what you want Admin</p>

        <div class="box">
            <form action="" method="post" class="form-container">
                <label>ID of Product to Update</label>
                <input name="id" type="text">
                <br><br>
                <label>New Name</label>
                <input name="name" type="text">
                <br><br>
                <label>New Price</label>
                <input name="price" type="text">
                <br><br>
                <label>New Image</label>
                <input name="image" type="text">
                <br><br>
                <input type="submit" value="Update Product" class="btn">
                <br><br>
                <a href="index.php" class="shop-link">Click here to view Products</a>
            </form>
        </div>
    </div>

    <?php
    include("connection.php");
  
    
    if (
        isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["image"]) &&
        !empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["image"])
    ) {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $image = $_POST["image"];
    
      
        // Construct the update query
        $query = "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id";
    
        // Execute the query
        $result = mysqli_query($conn, $query);
    
    }
    ?>
    
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

        .form-container form .btn {
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

        .form-container form .btn:hover {
            background-color: var(--black);
        }

        .form-container form .shop-link {
            display: block;
            text-align: center;
            padding: 15px 30px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 18px;
            color: var(--white);
            background-color: var(--blue);
            border-radius: 25px;
            text-transform: capitalize;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .form-container form .shop-link:hover {
            background-color: var(--black);
        }

        .heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 40px;
            text-transform: uppercase;
            color: var(--black);
        }

        .welcome-message {
            text-align: center;
            font-size: 20px;
            color: var(--black);
        }
    </style>

</body>

</html>
