<?php
$conn = mysqli_connect("localhost", "root", "", "shop");

$price = $_GET["price"];

$query = "SELECT * FROM `products` WHERE `price` < $price ";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>price</th>
        <th>image</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['image'] . "</td>";
        echo "</tr>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</table>
