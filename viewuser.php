<?php

include 'connection.php';
echo "<h5>View all products</h5>";

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>
<table border="5">
    <tr>
        <th>Products name</th>
        <th>price</th>
        <th>image</th>
        
    </tr>

</table>