<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='PPE GSB PAGE CONNEXION.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form  action="" method="post">
  <h1 ></h1>
    <h1 >S'inscrire</h1>
  <input type="text"  name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" name="email" placeholder="Email" required />
    <input type="password"  name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" />
    <p>Déjà inscrit? <a href="PPE GSB PAGE CONNEXION.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>