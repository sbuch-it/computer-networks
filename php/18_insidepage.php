<?php
// Starting the session
session_start();

if(empty($_SESSION['user'])) {
  // Code for not Logged members
  header("Location: 18-login.php");
} else {
  /* valid user */
  /* count number of accesses */
  $_SESSION['insidecnt']++;
  $_SESSION['timestamps'][] = date('l jS \of F Y h:i:s A');
}
?> 
<html>
  <head>
    <title>Welcome page</title>
  </head>
  <body style="background-color: lavender;font-family: arial">
    <?php
    echo "<h1>Welcome ". $_SESSION['user'] ."</h1>";
    echo "You reloaded ". $_SESSION['insidecnt'] .
      " times this page in your current session";
    ?>
    <p>
    <?php
    foreach($_SESSION['timestamps'] as $ts)
      echo $ts . "<br />";
    ?>
    </p>
    <br /><a href="18-logout.php">Logout</a>
  </body>
</body>