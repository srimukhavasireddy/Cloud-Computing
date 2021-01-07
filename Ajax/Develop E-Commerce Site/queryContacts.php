<?php

$username = "root";
$password = "ec2-User";
$database = "project";


$Name = $_GET['Name'];
$con=mysqli_connect('localhost', $username, $password,$database);
$query = "select * from Item where Itemid in (select Itemid from Shipment where CustID in (select CustID from Customer where Name LIKE '%$Name%')) ";
$query = "select * from Customer where Name LIKE '%$Name%'";
$result = mysqli_query($con,$query);

if (mysqli_num_rows($result) == 0)
{
        echo "Name not found in database";
}
else
{
while ($row = $result->fetch_row()) {
  $CustID = $row[0];
  $Name = $row[1];
  $Street = $row[2];
  $City = $row[3];
  $State = $row[4];
  $Telephone = $row[5];


  echo "<p><b>Customer ID : $CustID </b> <br/>\nCustomer Name: $Name<br/> \nAdress : $Street $City $State <br/>Phone number : $Telephone <br/> </p>\n\n";



$query_2 = "select * from Shipment where CustID = '$CustID'";
$result_2 = mysqli_query($con,$query_2);

if (mysqli_num_rows($result_2) == 0)
{
        echo "Name not found in database";
}
else
{
while ($row = $result_2->fetch_row()) {
$ShipmentID = $row[0];
  $Tracking = $row[1];
  $CustID = $row[2];
  $Itemid = $row[3];
  $EstimatedDate = $row[4];


  echo "<p><b> Order ID : $ShipmentID </b> <br/>\nTracking number: $Tracking <br/> \nCustomer ID : $CustID <br/>Item ID : $Itemid <br/> Estimated shipping date : $EstimatedDate <br/></p>\n\n";



$query_3 = "select * from Item where Itemid = '$Itemid'";
$result_3 = mysqli_query($con,$query_3);

if (mysqli_num_rows($result_3) == 0)
{
        echo "Name not found in database";
}
else
{
while ($row = $result_3->fetch_row()) {
  $Itemid = $row[0];
  $Description = $row[1];
  $Price = $row[2];

  echo "<p><b> Item ID : $Itemid </b> <br/>\nDescription: $Description <br/> \nPrice of an item is: $Price <br/></p>\n\n";

}
}
}
}
}
}



mysqli_close($con);
?>

