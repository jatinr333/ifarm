<?php
$con=mysqli_connect("localhost:3306","jatinr","jatinr33","aavpubli_farm");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM currentfiles WHERE jtype='Journal of Tropical Animal Research'";
$sql1="SELECT * FROM currentfiles WHERE jtype='Journal of Asian Agriculture'";
$sql2="SELECT * FROM currentfiles WHERE jtype='Asian Journal of Dairy Science'";
$sql3="SELECT * FROM currentfiles WHERE jtype='Asian Journal of Fisheries Research'";
if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }
  if ($result=mysqli_query($con,$sql1))
  {
  // Return the number of rows in result set
  $rowcount2=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

  if ($result=mysqli_query($con,$sql2))
  {
  // Return the number of rows in result set
  $rowcount3=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

  if ($result=mysqli_query($con,$sql3))
  {
  // Return the number of rows in result set
  $rowcount4=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

?>