<?php

include "connection.php";

$result = [];

$candySQL = "SELECT orderid, comments, IF(comments like '%candy%', 'candy', IF(comments like '%call%', 'contact purchaser', IF(comments like '%referred%', 'referrals', 'Miscellaneous'))) AS classification FROM sweetwater_test";

$result = $conn->query($candySQL);

if ($result->num_rows > 0)
{
    echo "<h1>hi</h1>";
    while($row = $result->fetch_assoc())
    echo "<h1>order id: " . $row['orderid'] . " comment: " . $row['comments'] . "classification: " . $row['classification'] . "</h1>";
}
?>
