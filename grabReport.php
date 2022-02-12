<?php

include "connection.php";

$result = [];

$reportSQL = "SELECT orderid, comments, IF(comments like '%candy%', 'candy', IF(comments like '%call%', 'contact purchaser', IF(comments like '%referred%', 'referrals', 'Miscellaneous'))) AS classification FROM sweetwater_test ORDER BY classification";

$result = $conn->query($reportSQL);

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    echo "<h1>order id: " . $row['orderid'] . " comment: " . $row['comments'] . "classification: " . $row['classification'] . "</h1>";
}
?>
