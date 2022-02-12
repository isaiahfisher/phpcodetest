<?php

include "connection.php";

$result = [];

$reportSQL = "SELECT orderid, comments, 
              IF(comments LIKE '%candy%', 'candy', IF(comments LIKE '%call%', 'contact preferences', IF((comments LIKE '%signature%' OR comments LIKE '%sign%'), 'Delivery Signature', IF(comments LIKE '%referred%', 'referrals', 'Miscellaneous')))) AS classification 
              FROM sweetwater_test ORDER BY classification";

$result = $conn->query($reportSQL);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    echo "<h1>order id: " . $row['orderid'] . " comment: " . $row['comments'] . "classification: " . $row['classification'] . "</h1>";
}
?>
