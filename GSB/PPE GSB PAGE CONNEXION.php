<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: acceuil.html");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<img src="Capture.jpg" />
<form action="" method="post" name="login">
<h1 ></h1>
<h1 class="top" >Connexion</h1>
<div class="mid">
<input type="text"  name="username" placeholder="Nom d'utilisateur" > 
</div>
</br>
<div class="mid">
<input type="password"  name="password" placeholder="Mot de passe" >
</div>
</br>
<div class="mid">
<input type="submit" value="Connexion " name="submit" >
</div>
<p>Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>