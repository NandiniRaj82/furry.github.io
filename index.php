<?php 
  session_start(); 
  setcookie('isLoggedIn', 'true', time() + (86400 * 30), '/');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy(); 	
  	unset($_SESSION['username']);
  	 header("location: login.php");
  }
  if (isset($_SESSION['username'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="header">
	<h2>Successful</h2>
</div>
<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<a href="project.html?isLoggedIn=<?php echo $isLoggedIn ? 'true' : 'false'; ?>" style="color: red;">Click Here to go to back</a>		    <?php endif ?>

</div>
<script>
var urlParams = new URLSearchParams(window.location.search);
var isLoggedIn = urlParams.get("isLoggedIn");

if (isLoggedIn) {
    var welcomeMessage = document.getElementById("registerLink");
    welcomeMessage.innerHTML = "Welcome";
}
</script>
</body>
</html>
