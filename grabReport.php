<?php

include "connection.php";

$result = [];

$candySQL = "SELECT orderid, comments, 'candy' AS classification FROM sweetwater_test where comments like '%candy%'";

$result = $conn->query($candySQL);

if ($result->num_rows > 0)
{
    echo "<h1>hi</h1>";
    while($row = $result->fetch_assoc())
    echo "<h1>order id: " . $row['orderid'] . " comment: " . $row['comments'] . "classification: " . $row['classification'] . "</h1>";
}
?>
