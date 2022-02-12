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
        $shipment_date_str = preg_replace('#[^\pN/]+#', '', $comment);
        $shipment_date = date_create_from_format('m/d/y', $shipment_date_str)->format('Y-m-d');
        $status = $insertDateStmt->execute();
    }
}


$conn->close();
?>
