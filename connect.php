<?php

$EmployeeNo = $_POST ['EmployeeNo'];
$Name = $_POST ['Name'];
$email = $_POST ['email'];
$Salary = $_POST ['Salary'];

//Databas connection
$conn = new mysqli('localhost', 'root','', 'employees');
if ($conn->connect_error)
{
  die('Connection Failed : '.$conn->connect_error);

}
else
{
$stmt = $conn->prepare("insert into employees(EmployeesID, Name, Email, Salary) values(?, ?, ?, ?)");
$stmt->bind_param("sssi", $EmployeeNo, $Name, $email, $Salary);
$stmt->execute();
echo "Registration Succesfully";
header('Location: Management.php');
$stmt->close();
$conn->close();

}

 ?>
