<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

		<title>Créer un compte</title>

  <link rel="stylesheet" href="css/custom.css">
	</head>

<body>
	<div >
    <form method="post" id="loginform" style="height: 1000px;width: 600px;margin-bottom:100px;">
							<div style="width:100%;text-align:center;margin-top:130px;">

							<?php
							session_start();
							if(!isset($_SESSION["createchampsremplis"])){
								(boolean)$_SESSION["createchampsremplis"] = false;
							}
							if($_SESSION["createchampsremplis"] == true){
								echo "Tous les champs doivent être remplis.<br><br><br>";
								$_SESSION["createchampsremplis"] = false;
							}
							if(!isset($_SESSION["mdpidentique"])){
								(boolean)$_SESSION["mdpidentique"] = false;
							}
							if($_SESSION["mdpidentique"] == true){
								echo 'Les mots de passe doivent être identiques.<br><br><br>';
								$_SESSION["mdpidentique"] = false;
							}
							?>

								Prénom<br><br>
								<input type="text" name="prenom" size="20"  maxlength="20" placeholder="Varchar"> <br><br>
                Nom<br><br>
                <input type="text" name="nom" size="20"  maxlength="20" placeholder="Varchar"> <br><br>
                Adresse<br><br>
                <input type="text" name="adresse" size="20"  maxlength="40" placeholder="Varchar"> <br><br>
                Code postal<br><br>
                <input type="number" name="cdp" size="20"  maxlength="5" placeholder="Int 5"> <br><br>
                Ville<br><br>
                <input type="text" name="ville" size="20"  maxlength="30" placeholder="Varchar"> <br><br>
                Téléphone<br><br>
                <input type="number" name="tel" size="20"  maxlength="10" placeholder="Int 10"> <br><br>
                Email<br><br>
                <input type="text" name="mail" size="20"  maxlength="45" placeholder="Varchar"> <br><br>
                Mot de passe<br><br>
                <input type="password" name="password" size="20"  maxlength="255" placeholder="Varchar"> <br><br>
                Répéter le mot de passe<br><br>
                <input type="password" name="password2" size="20"  maxlength="255" placeholder="Varchar"> <br><br>
                <input type="submit" value="Envoyer" name="envoyer">

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
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['tel']) || empty($_POST['mail']) || empty($_POST['adresse']) || empty($_POST['ville']) ||
    empty($_POST['cdp']) || empty($_POST['password']) || empty($_POST['password2'])){
      $_SESSION["createchampsremplis"] = true;
			header('Location: createaccount.php');
			exit();
    }

    else{

      $mdp = $_POST['password'];
      $mdp2 = $_POST['password2'];

      if($mdp == $mdp2){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $cdp = $_POST['cdp'];

        $req = "SELECT count(*) + 1 from utilisateurs";
        $prep = $dbh->query($req);
        $ref = $prep->fetch();

          session_start();
          $_SESSION['prenom'] = $prenom;
    			$_SESSION['nom'] = $nom;
          $_SESSION["login"] = $mail;
          $_SESSION["mdp"] = $mdp;
          $_SESSION["active"] = true;
          $_SESSION["msg"] = true;

          $req = ("INSERT INTO clients () VALUES (?,?,?,?,?,?,?,?,?);");
          $sql = ($dbh->prepare($req));
          $sql -> execute(array(dechex($ref[0]), $adresse, $cdp, $ville, $tel, $nom, $prenom, $mail, $mdp));

          header('Location: index.php');
          exit();
        }
        else{
          $_SESSION["mdpidentique"] = true;
					header('Location: createaccount.php');
          exit();
        }
      }
    }
  ?>

  </body>

</html>
