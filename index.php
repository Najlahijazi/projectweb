<?php
include('connection.php'); // Assuming your database connection is in 'db.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="user-profile">
            <div class="flex">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="option-btn">Register</a>
                <a href="logout.php" onclick="return confirm('Are you sure you want to logout?');" class="delete-btn">Logout</a>
            </div>
        </div>

        <div class="products">
            <h1 class="heading">Latest Products</h1>
            <div class="box-container">
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                        ?>
                        <div class="box">
                            <div class="image-box">
                                <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                            </div>
                            <div class="name"><?php echo $fetch_product['name']; ?></div>
                            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <form method="post" action="adduser.php">
                                <div class="buttons">
                                    <input type="submit" value="Add to Cart" name="addtocart" class="btn">
                                </div>
                            </form>
                            <form method="post" action="deleteuser.php">
                                <div class="buttons">
                                    <input type="submit" value="Delete from Cart" name="deletefromcart" class="btn">
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>

<html>

<body>
    <script>
        function search() {
            let ajaxRequest = new XMLHttpRequest();
            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
                    document.getElementById("ajaxDiv").innerHTML = ajaxRequest.responseText;
                }
            }

            let price = document.getElementById("price").value;

            ajaxRequest.open("GET", "go.php?price=" + price, true);
            ajaxRequest.send();

        }

    </script>


    <form>
        Max price: <input type="number" id="price">
        <br>
       

        <input type="button" value="search" onclick="search()" />
    </form>
    <div id="ajaxDiv">Your result will be shown here!</div>


</body>

</html>


<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

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

* {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
}

*::-webkit-scrollbar {
  width: 10px;
  height: 5px;
}

*::-webkit-scrollbar-track {
  background-color: transparent;
}

*::-webkit-scrollbar-thumb {
  background-color: var(--blue);
}

body {
  background-color: var(--light-bg);
}

.message {
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  padding: 15px 10px;
  background-color: var(--white);
  text-align: center;
  z-index: 1000;
  box-shadow: var(--box-shadow);
  color: var(--black);
  font-size: 20px;
  text-transform: capitalize;
  cursor: pointer;
}

.btn,
.delete-btn,
.option-btn {
  display: inline-block;
  padding: 10px 30px;
  cursor: pointer;
  font-size: 18px;
  color: var(--white);
  border-radius: 5px;
  text-transform: capitalize;
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover {
  background-color: var(--black);
}

.btn {
  background-color: var(--blue);
  margin-top: 10px;
}

.delete-btn {
  background-color: var(--red);
}

.option-btn {
  background-color: var(--orange);
}

.form-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  padding-bottom: 70px;
}

.form-container form {
  width: 500px;
  border-radius: 5px;
  border: var(--border);
  padding: 20px;
  text-align: center;
  background-color: var(--white);
}

.form-container form h3 {
  font-size: 30px;
  margin-bottom: 10px;
  text-transform: uppercase;
  color: var(--black);
}

.form-container form .box {
  width: 100%;
  border-radius: 5px;
  border: var(--border);
  padding: 12px 14px;
  font-size: 18px;
  margin: 10px 0;
}

.form-container form p {
  margin-top: 20px;
  font-size: 20px;
  color: var(--black);
}

.form-container form p a {
  color: var(--red);
}

.form-container form p a:hover {
  text-decoration: underline;
}

.container {
  padding: 0 20px;
  margin: 0 auto;
  max-width: 1200px;
  padding-bottom: 70px;
}

.container .heading {
  text-align: center;
  margin-bottom: 20px;
  font-size: 40px;
  text-transform: uppercase;
  color: var(--black);
}

.container .user-profile {
  padding: 20px;
  text-align: center;
  border: var(--border);
  background-color: var(--white);
  box-shadow: var(--box-shadow);
  border-radius: 5px;
  margin: 20px auto;
  max-width: 500px;
}

.container .user-profile p {
  margin-bottom: 10px;
  font-size: 25px;
  color: var(--black);
}

.container .user-profile p span {
  color: var(--red);
}

.container .user-profile .flex {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
  align-items: flex-end;
}

.container .products .box-container {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center;
}

.container .products .box-container .box {
  text-align: center;
  border-radius: 5px;
  box-shadow: var(--box-shadow);
  border: var(--border);
  position: relative;
  padding: 20px;
  background-color: var(--white);
  width: 350px;
}

.container .products .box-container .box img {
  height: 250px;
}

.container .products .box-container .box .name {
  font-size: 20px;
  color: var(--black);
  padding: 5px 0;
}

.container .products .box-container .box .price {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 5px 10px;
  border-radius: 5px;
  background-color: var(--orange);
  color: var(--white);
  font-size: 25px;
}

.container .products .box-container .box input[type="number"] {
  margin: 10px 0;
  width: 100%;
  border: var(--border);
  border-radius: 5px;
  font-size: 20px;
  color: var(--black);
  padding: 12px 14px;
}

.container .shopping-cart {
  padding: 20px 0;
}

.container .shopping-cart table {
  width: 100%;
  text-align: center;
  border: var(--border);
  border-radius: 5px;
  box-shadow: var(--box-shadow);
  background-color: var(--white);
}

.container .shopping-cart table thead {
  background-color: var(--black);
}

.container .shopping-cart table thead th {
  padding: 10px;
  color: var(--white);
  text-transform: capitalize;
  font-size: 20px;
}

.container .shopping-cart table .table-bottom {
  background-color: var(--light-bg);
}

.container .shopping-cart table tr td {
  padding: 10px;
  font-size: 20px;
  color: var(--black);
}

.container .shopping-cart table tr td:nth-child(1) {
  padding: 0;
}

.container .shopping-cart table tr td input[type="number"] {
  width: 80px;
  border: var(--border);
  padding: 12px 14px;
  font-size: 20px;
  color: var(--black);
}

.container .shopping-cart .cart-btn {
  margin-top: 10px;
  text-align: center;
}

.container .shopping-cart .disabled {
  pointer-events: none;
  background-color: var(--red);
  opacity: 0.5;
  user-select: none;
}

@media (max-width: 1200px) {
  .container .shopping-cart {
    overflow-x: scroll;
  }

  .container .shopping-cart table {
    width: 1200px;
  }
}

@media (max-width: 450px) {
  .container .heading {
    font-size: 30px;
  }
  .container .products .box-container .box img {
    height: 200px;
  }
}/* Your existing styles here */

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
  background-color: var(--light-bg);
}

.container {
  padding: 0 20px;
  margin: 0 auto;
  max-width: 1200px;
  padding-bottom: 70px;
}

.heading {
  text-align: center;
  margin-bottom: 20px;
  font-size: 40px;
  text-transform: uppercase;
  color: var(--black);
}

.user-profile {
  padding: 20px;
  text-align: center;
  border: var(--border);
  background-color: var(--white);
  box-shadow: var(--box-shadow);
  border-radius: 5px;
  margin: 20px auto;
  max-width: 500px;
}

.user-profile p {
  margin-bottom: 10px;
  font-size: 25px;
  color: var(--black);
}

.user-profile p span {
  color: var(--red);
}

.user-profile .flex {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
  align-items: flex-end;
}

.products .box-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
}

.products .box-container .box {
  text-align: center;
  border-radius: 5px;
  box-shadow: var(--box-shadow);
  border: var(--border);
  position: relative;
  padding: 20px;
  background-color: var(--white);
  width: 300px;
  margin-bottom: 20px;
  transition: transform 0.3s ease-in-out;
}

.products .box-container .box:hover {
  transform: translateY(-10px);
}

.products .box-container .box .image-box {
  overflow: hidden;
  border-radius: 5px;
  height: 200px;
}

.products .box-container .box img {
  width: 80%;
  height: 80%;
  object-fit: cover;
  border-radius: 5px;
}

.products .box-container .box .name {
  font-size: 18px;
  color: var(--black);
  margin-top: 10px;
}

.products .box-container .box .price {
  position: absolute;
  top: 10px;
  left: 10px;
  padding: 5px 10px;
  border-radius: 5px;
  background-color: var(--orange);
  color: var(--white);
  font-size: 20px;
}

.products .box-container .box input[type="number"] {
  margin: 10px 0;
  width: 80%;
  border: var(--border);
  border-radius: 5px;
  font-size: 16px;
  color: var(--black);
  padding: 10px;
}

.products .box-container .box .buttons {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 10px;
}

.products .box-container .box .buttons input[type="submit"] {
  flex: 1;
  padding: 10px;
  font-size: 16px;
  color: var(--white);
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.products .box-container .box .buttons .btn {
  background-color: var(--blue);
}

.products .box-container .box .buttons .delete-btn {
  background-color: var(--red);
}

.option-btn {
  display: inline-block;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
  color: var(--white);
  border-radius: 5px;
  text-transform: capitalize;
  background-color: var(--orange);
  margin-top: 10px;
}

.option-btn:hover {
  background-color: darken(var(--orange), 10%);
}


    
</style>
