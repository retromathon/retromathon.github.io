<?php
  require "php/panier.php";
  include 'productgenres.php';
  
  if(!isset($_SESSION["ref"]))
  {
    echo '<script> alert(\'Veuillez vous enregistrer\'); window.location.replace("/retromathon/");</script> ';
    exit();
  }

  //Faut-il traiter le panier (variable action existe)
  if ((isset($_GET['action']))&&(isset($_GET['a']))){
    switch($_GET['action'])
    {
      case 'INCREMANTEARTICLE' : incremanteArticle($_GET['a']); break;
      case 'DECREMANTEARTICLE' : decremanteArticle($_GET['a']); break;
      case 'DELETEARTICLE' : supprimerArticle($_GET['a']); break;
      case 'PASSECOMMANDE' : passeCommande($_GET['a']); break;
    }
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

<!-- MENU GENRES -->

  <section>
    <div class="content">
      <div class="left">

        <div class="listeproduits" style="left:-20px;">
          <ul>
            <ul><div class="imag" id="jeuxl" onclick="genres(this.id)"><img src="img/arrow.png" class="arrow"><button class="myButton"><p1>Jeux</p1></button></div></ul>

            <form method="post">
              <li class="jeuxlcol hidden" name="envoyerjeux"><button class="genrebutton" type="submit" name="action">Action</button></li>
              <li class="jeuxlcol hidden" name="envoyerjeux"><button class="genrebutton" type="submit" name="HacknSlash">Hack 'n' Slash</button></li>
              <li class="jeuxlcol hidden" name="envoyerjeux"><button class="genrebutton" type="submit" name="sandbox">Sandbox</button></li>
              <li class="jeuxlcol hidden" name="envoyerjeux"><button class="genrebutton" type="submit" name="sports">Sports</button></li>
            </form>

            <ul><div class="imag" id="filmsl" onclick="genres(this.id)"><img src="img/arrow.png" class="arrow"><button class="myButton"><p1>Films</p1></button></div></ul>

            <form method="post">
              <li class="filmslcol hidden" name="envoyerfilms"><button class="genrebutton" type="submit" name="Animation">Animation</button></li>
              <li class="filmslcol hidden" name="envoyerfilms"><button class="genrebutton" type="submit" name="Aventure">Aventure</button></li>
              <li class="filmslcol hidden" name="envoyerfilms"><button class="genrebutton" type="submit" name="Science-Fiction">Science-Fiction</button></li>
              <li class="filmslcol hidden" name="envoyerfilms"><button class="genrebutton" type="submit" name="Superheros">Super-Héros</button></li>
            </form>

            <ul><div class="imag" id="musiquesl" onclick="genres(this.id)"><img src="img/arrow.png" class="arrow"><button class="myButton"><p1>Musiques</p1></button></div></ul>

            <form method="post">
              <li class="musiqueslcol hidden" name="envoyermusiques"><button class="genrebutton" type="submit" name="Electronic">Electronic</button></li>
              <li class="musiqueslcol hidden" name="envoyermusiques"><button class="genrebutton" type="submit" name="Hip-Hop">Hip-Hop</button></li>
              <li class="musiqueslcol hidden" name="envoyermusiques"><button class="genrebutton" type="submit" name="Jazz">Jazz</button></li>
              <li class="musiqueslcol hidden" name="envoyermusiques"><button class="genrebutton" type="submit" name="Rock">Rock</button></li>
            </form>
          </ul>
        </div>
      </div>



    <div class="maincontent">
    
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
                          <td>".$panier[$i][1]." <button OnClick=\"incremanteArticle('".$panier[$i][0]."')\">+</Button> <button OnClick=\"decremanteArticle('".$panier[$i][0]."')\">-</Button> </td>
                          <td>".$panier[$i][5]."</td>
                          <td>".($panier[$i][5]*$panier[$i][1])."</td>
                          <td><a type=\"button\" onClick=\"delArticle('".$panier[$i][0]."')\"><i class=\"far fa-trash-alt fa-2x\"></i></a></td>
                        </tr>";
                }

                echo "</tbody>
                </table>
                <br><br>
                <button class=\"myButton\" onClick=\"passerCommande()\">commander</button>";
              }
        ?>

      </div>
    </div>
    <div id="footer">
      <a href="mentionslegales.pdf" target="_blank">Mentions légales</a>
    </div>
  </section>

  <script>
    function genres(elem){
          var colArray = ["jeuxlcol", "filmslcol", "musiqueslcol"];
          var coll = document.getElementsByClassName(elem+"col");

          for (var p=0;p<colArray.length;p++){

            if(colArray[p] == elem+"col"){

              for (i=0;i<coll.length;i++){

                if (coll[i].classList.contains("hidden")==true){
                  coll[i].classList.remove("hidden");
                }
                else if (coll[i].classList.contains("hidden")==false){
                  coll[i].classList.add("hidden");
                }
              }
              colArray.splice(p, 1);

              for(i=0;i<colArray.length;i++){
                var colRemove=document.getElementsByClassName(colArray[i]);

                  for(var j=0;j<colRemove.length;j++){
                    if(colRemove[j].classList.contains("hidden")==false){
                      colRemove[j].classList.add("hidden");
                  }
                }
              }
            }
          }
      }

      function passerCommande(){
        window.location='PagePanier.php?a=' + <?php echo '\''.$_SESSION["ref"].'\''; ?> + '&action=PASSECOMMANDE';
    }

    function delArticle(idArticle)
    {
      window.location='PagePanier.php?a=' + idArticle + '&action=DELETEARTICLE';
    }

    function incremanteArticle(idArticle)
    {
      window.location='PagePanier.php?a=' + idArticle + '&action=INCREMANTEARTICLE';
    }

    function decremanteArticle(idArticle)
    {
      window.location='PagePanier.php?a=' + idArticle + '&action=DECREMANTEARTICLE';  
    }

  </script>
  </body>

</html>
