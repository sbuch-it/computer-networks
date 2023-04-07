<?php
require '18_config.php';

// check if login form is filled
$user = trim($_REQUEST['username']);
$pass = trim($_REQUEST['password']);

if(!empty($user) && !empty($pass)) {
  
  /* check if user is defined with the given password */
  if($Users[$user]==$pass) {              
    // Setting Session
	  session_start();
    $_SESSION['user'] = $user;
    // Redirecting to the logged page.
    header("Location: 18-insidepage.php");
  } else { 
    // Wrong username or Password. Show error here.
    header("Location: 18-login.php?error=yes");
  }              
} else {
  /* no login data: send login form */
?>

<html>
  <head>
    <title>Login page</title>
  </head>
  <body style="background-color: lavender;font-family: arial">
  <?php
  if(!empty($_REQUEST['error'])) {
  ?>
    <!-- error box in case of invalide user-password pair as set by the error GET variable -->
    <div style="border-style:groove;border-color:red">
      <h3 style="color:red">Wrong username and/or password</h3>
    </div>
    <br />
  <?php
  }
  ?>
  <h2>User Login</h2>
  <form action="18-login.php" method="post">
    Username <input type="text" name="username" size="15"/> <br />
    Password <input type="password" name="password" /> <br />
    <input type="submit" />
  </form>
<?php
}
?>
  </body>
</html>