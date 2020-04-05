
 --a finir--
<?php
  require "php/panier.php";
  include 'productgenres.php';
  
  if(!isset($_SESSION["ref"]))
  {
    echo '<script> alert(\'Veuillez vous enregistrer\'); window.location.replace("/retromathon/");</script> ';
    exit();
  }
  ?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Retromathon</title>
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/PagePanier.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css">
</head>

<body>

  <style>
    ul{
      list-style-type: none;
      margin-left: -40px;
      line-height: 50px;
    }
    li{
      margin-left:30px;
      margin-top: 10px;
      line-height: 30px;
    }
  </style>

  <?php
      if(!isset($_SESSION["active"])){
        (boolean)$_SESSION["active"] = false;
      }

      if(isset($_SESSION["msg"])){
        if($_SESSION["msg"] == true){
          $_SESSION['msg'] = false;
          echo "<script type='text/javascript'>alert('" . "Bienvenue " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "');</script>";
        }
      }
  ?>

<div id="topbar"><div id="marque"><a href="index.php" style="text-decoration: none;"><h10>RETRO</h10><h11>mathon</h11></a></div>

<div id="panier">
      <div class="panier">
      <a href="PagePanier.php"><i class="fas fa-shopping-cart fa-3x"></i></a>
      </div>
    </div>

    <div id="search">
      <div class="searchbar">
        <input type="text" placeholder="Search..">
      </div>
    </div>



<!-- HEADER -->

    <div id="connect">
      <div>
        <div class="client">
          <t1>ESPACE<br>CLIENT</t1>
          <div class="clientmenu">
            <?php
            if($_SESSION["active"] == true){
              echo '<p1 style="font-size:18;">Bonjour, ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</p1><br><br>" .
                    '<a href=""><p1 style="font-size:18;">Panier</p1></a><br>
                    <a href=""><p1 style="font-size:18;">Commandes</p1></a><br>
                    <a href="add.html"><p1 style="font-size:18;">Espace admin</p1></a><br>
                    <a href="php/deconnexion.php"><p1 style="font-size:18;">Déconnexion</p1></a><br>';
            } else {
              echo '<br><a href="login.php"><p1 style="font-size:18;">Identification</p1></a><br>
                  <a href="createaccount.php"><p1 style="font-size:18;">Créer un compte</p1></a><br>
                  <a href="add.html"><p1 style="font-size:18;">Espace admin</p1></a><br>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
              try {
                $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
              }
              catch( PDOException $Exception ) {
                echo $Exception->getMessage();
                die();
              }

              //nb article panier 
              //$req = "SELECT COUNT(*) FROM selectionne,paniers WHERE paniers.REF_USER = " . "'" . $_SESSION['ref'] . "' AND paniers.ETAT_PANIER =1";
              $req = "SELECT
                articles.REF_ART,
                selectionne.QTE_CHOISI,
                articles.NOM_ART,
                articles.ARTISTE,
                articles.DESC_ART,
                articles.PRIX_UNIT
              FROM
                paniers
                INNER JOIN selectionne ON selectionne.REF_PANIER = paniers.REF_PANIER
                INNER JOIN articles ON selectionne.REF_ART = articles.REF_ART
              WHERE
                paniers.REF_USER = '".$_SESSION['ref']."' AND paniers.ETAT_PANIER = 1;";

              $prep = $dbh->query($req);
              if($prep==false) //Erreur
              {
                echo 'Erreur requete count';
                die();  
              }

              $panier = $prep->fetchall();
              if(($panier==null)||(count($panier)==0)) //Panier Vide
              {
                echo 'PANIER VIDE';
                //die();
              }
              else
              {
                echo "<table class=\"steelBlueCols\">
                      <thead>
                        <tr>
                          <th>Ref</th>
                          <th>Nom</th>
                          <th>Description</th>
                          <th>Artiste</th>
                          <th>Qte</th>
                          <th>Prix Unitaire</th>
                          <th>Prix Total</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>";

                //Affiche chaque ligne dans la tableau
                for($i=0;$i<count($panier);$i++)
                {
                  echo "<tr>
                          <td>".$panier[$i][0]."</td>
                          <td>".$panier[$i][2]."</td>
                          <td>".$panier[$i][4]."</td>
                          <td>".$panier[$i][3]."</td>
                          <td>".$panier[$i][1]." </td>
                          <td>".$panier[$i][5]."</td>
                          <td>".($panier[$i][5]*$panier[$i][1])."</td>
                          <td><a type=\"button\" onClick=\"delArticle('".$panier[$i][0]."')\"><i class=\"far fa-trash-alt fa-2x\"></i></a></td>
                        </tr>";
                }

                echo "</tbody>
                </table>
                <br><br>"
              }
        ?>
