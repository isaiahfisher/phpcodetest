<?php
include "connection.php";

$reportSQL = "SELECT orderid, comments, shipdate_expected AS date,
              IF((comments LIKE '%candy%' OR comments LIKE '%smarties%'), 'candy', IF((comments LIKE '%call%' OR comments LIKE '%contact%'), 'contact preferences', IF((comments LIKE '%signature%' OR comments LIKE '%sign%'), 'Delivery Signature', IF(comments LIKE '%referred%', 'referrals', 'Miscellaneous')))) AS classification 
              FROM sweetwater_test ORDER BY classification";

$result = $conn->query($reportSQL);
if ($result->num_rows > 0)
{
    echo "<table border='1'><tr><th>Order ID</th><th>Comments</th><th>Classification</th><th>Expected Delivery</th></tr>";
    while($row = $result->fetch_assoc())
    {
       echo "<tr><td>" . $row['orderid'] . "</td><td style='text-align:center'>" . $row['comments'] . "</td><td>" . $row['classification'] . "</td><td>" . $row['date'] . "</td></tr>";
    }
    echo "</table>";
}


$conn->close();
?>
