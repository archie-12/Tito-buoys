<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) { unset($_SESSION["user"]); }

// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION["user"])){
header("Location: admin.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Management</title>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Management.css">
    </head>
    <body>
      <form class="dbform" action="" method="post">
        <label for="show"class="showbutton">Add Employees</label>
        <h2>Employees Record</h2>
        <br><br>
        <table>
          <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Salary</th>
          <th>Action</th>
        </tr>

        <?php
        $conn = mysqli_connect('localhost', 'root','', 'employees');
        if ($conn->connect_error)
        {
          die('Connection Failed : '.$conn->connect_error);
        }
        $sql = "SELECT EmployeesID, Name, Email, Salary from employees";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0)
        {
          while($row = $result-> fetch_assoc())
          {
            echo "<tr>
            <td>". $row["EmployeesID"] ."</td>
            <td>". $row["Name"]. "</td>
            <td>" .$row["Email"]. "</td>
            <td>" .$row["Salary"]. "</td>
            <td><a href = 'delete.php?rn=$row[EmployeesID]'>Delete</td>
            </tr>";
          }
          echo "</table>";
        }
        else {
          echo "0 Result";
        }
        $conn-> close();
         ?>

        </table>
      </form>
    <input type="checkbox" id="show" value="">

<div class="close">
    <form class = "form" action="connect.php" method="post">
    <label for="show"class="close-btn">x</label>
    <li>
      <br>
    <h2> Add Employee Details </h2>
    <br>
    </li>
    <li>
      <input type="number" name = "EmployeeNo" placeholder="Employee No." required>
    </li>
    <li>
      <input type="text" name = "Name" placeholder="Name" required>
    </li>
    <li>
      <input name = "email" type="Email" placeholder="Email" required >
    </li>
    <li>
      <input type="number" name = "Salary" placeholder="Salary" required></input>
    </li>
    <li>
      <button type = "submit" class="Formbtn Submitbtn">Save</button>
    </li>
    </form>
    </div>
    <form  method="post">
      <input type="hidden" name="logout" value="1"/>
      <input type="submit" value="logout"/>
    </form>
    </body>
    </html>
