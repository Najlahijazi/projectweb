<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to our shop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap">
    <body>
    <div class="container">
        <div class="heading">
            <h1>Welcome to our shop</h1>
        </div>

        <div class="welcome-message">
            <p>This is the home page of our shop. Explore our amazing products and enjoy shopping!</p>
        </div>

        <a href="index.php" class="shop-link">Click here to shop</a>
    </div>


    
</body>
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

        .shop-link {
            display: block;
            text-align: center;
            padding: 10px 30px;
            margin: 20px auto;
            cursor: pointer;
            font-size: 18px;
            color: var(--white);
            background-color: var(--blue);
            border-radius: 5px;
            text-transform: capitalize;
            text-decoration: none;
        }

        .shop-link:hover {
            background-color: var(--black);
        }

        @media (max-width: 450px) {
            .heading {
                font-size: 30px;
            }
        }
   
    </style>
</head>

</html>

