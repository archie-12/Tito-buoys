<?php
include("connection.php");
if(isset($_GET['rn']))
{
  $rn = $_GET['rn'];
  $delete=mysqli_query($conection,"DELETE FROM employees WHERE EmployeesID = '$rn'" );
  header('Location: Management.php');
}
$select="select * from employees";
$query=mysqli_query($conection,$select);
 ?>
