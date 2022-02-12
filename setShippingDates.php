<?php
include "connection.php";

$shippingDatesSQL = "SELECT orderid, comments FROM sweetwater_test WHERE comments RLIKE '[0-9]+/[0-9]+/[0-9]+'";

$result = $conn->query($shippingDatesSQL);
if ($result->num_rows > 0)
{
    $insertDateStmt = $conn->prepare("UPDATE sweetwater_test SET shipdate_expected=? WHERE orderid=?");

    while($row = $result->fetch_assoc())
    {
        $orderid = $row['orderid'];
        $comment = $row['comments'];
        $insertDateStmt->bind_param("si", $shipment_date, $orderid);
        preg_match('#\d{1,2}/\d{1,2}/\d{2,4}+#', $comment, $matches);
        $shipment_date_str = $matches[0];
        $shipment_date = new DateTime($shipment_date_str);
        $shipment_date = $shipment_date->format('Y-m-d');
        $status = $insertDateStmt->execute();
    }
}


$conn->close();
?>
