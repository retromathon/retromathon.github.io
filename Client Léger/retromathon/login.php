<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

		<title>S'identifier</title>

  <link rel="stylesheet" href="css/custom.css">

	</head>

<body>
	<div >
    <form method="post" id="loginform" style="height: 500px;width: 600px;">
			<div style="text-align:center;margin-top:80px;width:100%;">
			<?php
			session_start();
			if(!isset($_SESSION["champsremplis"])){
				(boolean)$_SESSION["champsremplis"] = false;
			}
			if(!isset($_SESSION["connectrefus"])){
				(boolean)$_SESSION["connectrefus"] = false;
			}
			if($_SESSION["champsremplis"] == true){
				echo "Tous les champs doivent être remplis.";
				$_SESSION["champsremplis"] = false;
			}
			if($_SESSION["connectrefus"] == true){
				echo "Connection refusée.";
				$_SESSION["connectrefus"] = false;
			}
			?>
			</div>
							<div style="width:100%;text-align:center;margin-top:50px;">

								<label for="login">Adresse mail :</label>
								<br><br>
								<input type="text" name="username" id="login" placeholder="login" autofocus/>
								<br><br>

								<label for="login">Mot de passe :</label>
								<br><br>
								<input type="password" name="password" id="pass" placeholder="mdp"/>
								<br><br>
								<input type="submit" value="Entrer" name="envoyer"/>

								<br><br><br><br>
								<a href="createaccount.php">Créer un compte</a>

							</div>
    </form>

	</div>

	<?php

	try {
			$dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
	}
	catch( PDOException $Exception ) {

			echo $Exception->getMessage();
			die();
	}

	if(isset($_POST['envoyer'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$_SESSION["champsremplis"] = true;
			header('Location: login.php');
			exit();
		}
		else{
			$mail = $_POST['username'];
			$mdp = $_POST['password'];

			$req = "SELECT REF_USER, MDP_USER, prenom_user, nom_user from clients where EMAIL_USER = " . "'" . $mail . "'";
		  $prep = $dbh->query($req);
			$res = $prep->fetch();

			$_SESSION['prenom'] = $res[2];
			$_SESSION['nom'] = $res[3];
			$_SESSION["ref"] = $res[0];

			/*$reqe = "SELECT * from paniers where ref_panier = " . "'" . $_SESSION['ref'] . "'";
		    $etatpanier = $dbh->query($reqe)->fetch();
			*/
			
			if($res[1] == $mdp){
				$_SESSION["login"] = $mail;
				$_SESSION["mdp"] = $mdp;
				$_SESSION["active"] = true;
				$_SESSION["msg"] = true;
				
				require "php/panier.php";
				creationPanier();

			header('Location: index.php');
			exit();
			}
	else
	{
		$_SESSION["connectrefus"] = true;
		header('Location: login.php');
	    exit();
	}
	}
}
	?>

  </body>

</html>
