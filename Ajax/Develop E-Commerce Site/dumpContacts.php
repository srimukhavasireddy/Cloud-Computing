<?php

$username = "root";
$password = "ec2-User";
$database = "project";

$con=mysqli_connect('localhost', $username, $password,$database);
$query = "select * FROM Shipment";
$result = mysqli_query($con,$query);


echo "<h3>List of shipment details</h3>\n\n";

while ($row = $result->fetch_row()) {
  $ShipmentID = $row[0];
  $Tracking = $row[1];
  $CustID = $row[2];
  $Itemid = $row[3];
  $EstimatedDate = $row[4];


  echo "<p><b>Shipment ID : $ShipmentID</b> <br/> Tracking number is : $Tracking<br/>customer ID : $CustID<br/> \nItem ID : $Itemid<br/>\nDeliveryDate: $EstimatedDate<br/></p>\n\n";

}
mysqli_close($con);

?>
