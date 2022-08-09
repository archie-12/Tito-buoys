<?php
// (A) START SESSION
session_start();
// (B) LOGOUT REQUEST
unset($_SESSION["user"]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
</head>
  <body>
    <form class = "form" action="check.php" method="post" target="_self">
    <li>
      <br>
    <h2> Log in </h2>
    <?php
    if (isset($_GET['error']))
    {
      ?> <p class="error"><?php echo $_GET['error'];?></p>
      <?php
    }
       ?>

    </li>
    <li>
      <label class="Username">Username:</label>
      <input type="text" name = "user" placeholder="Enter Username"  required>
    </li>
    <li>
      <label class="Password">Password:</label>
      <input type="password" name = "password" placeholder = "Input Password" required>
    </li>
    <li>
      <button type = "submit" name="login" class="Formbtn Submitbtn">Login</button>
    </li>
    </form>

  </body>
</html>
