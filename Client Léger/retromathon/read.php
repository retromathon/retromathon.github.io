<html>
<head>
  <title>Retromathon - Lire</title>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/addcss.css" rel="stylesheet">
  <script src="js/read.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<style>
  .tableform{
     margin-left:5%;
     margin-right:5%;
  }

</style>

<body>


<!-- TABLES -->


  <div id="left" style="background:#ff6666">
    <div class="tabler" id="administrateurs" onclick="show(this.id)"><br><p1>ADMINISTRATEURS</p1></div>
    <div class="tabler" id="articles" onclick="show(this.id)"><br><p1>ARTICLES</p1></div>
    <div class="tabler" id="clients" onclick="show(this.id)"><br><p1>CLIENTS</p1></div>
    <div class="tabler" id="commandes" onclick="show(this.id)"><br><p1>COMMANDES</p1></div>
    <div class="tabler" id="films" onclick="show(this.id)"><br><p1>FILMS</p1></div>
    <div class="tabler" id="jeux" onclick="show(this.id)"><br><p1>JEUX</p1></div>
    <div class="tabler" id="musiques" onclick="show(this.id)"><br><p1>MUSIQUES</p1></div>
    <div class="tabler" id="newarticles" onclick="show(this.id)"><br><p1>NEWARTICLES</p1></div>
    <div class="tabler" id="newfilms" onclick="show(this.id)"><br><p1>NEWFILMS</p1></div>
    <div class="tabler" id="newjeux" onclick="show(this.id)"><br><p1>NEWJEUX</p1></div>
    <div class="tabler" id="newmusiques" onclick="show(this.id)"><br><p1>NEWMUSIQUES</p1></div>
    <div class="tabler" id="paniers" onclick="show(this.id)"><br><p1>PANIERS</p1></div>
    <div class="tabler" id="selectionne" onclick="show(this.id)"><br><p1>SELECTIONNE</p1></div>
    <div class="tabler" id="utilisateurs" onclick="show(this.id)"><br><p1>UTILISATEURS</p1></div>
</div>

  <div class="line"></div>

  <div id="right">
    <h1></h1><br><p2>Vous êtes en mode lecture de données. <a href="add.html">Passer en mode insertion</a></p2><br><p2>Un clic sur les tables affiche le formulaire correspondant.</p2><br><br>
    <a href="index.php"><p2>Page d'accueil</p2></a><br><br><br><br><br>


    <!-- FORMULAIRES -->

    <?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
    }
    catch( PDOException $Exception ) {

        echo $Exception->getMessage();
        die();
    }
    ?>



      <form class="tableform" id="administrateursta" method="POST" action="">ADMINISTRATEURS
      <?php

          $req = "SELECT * from administrateurs";
          $prep = $dbh->query($req);

          echo '<br><table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_USER</th>
              <th>NOM_USER</th>
              <th>PRENOM_USER</th>
              <th>EMAIL_USER</th>
              <th>MDP_USER</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["NOM_USER"].'</td>
              <td>'.$ligne["PRENOM_USER"].'</td>
              <td>'.$ligne["EMAIL_USER"].'</td>
              <td>'.$ligne["MDP_USER"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="articlesta" method="POST" action="php/read.php">ARTICLES
      <?php

          $req = "SELECT * from articles";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_ART</th>
              <th>REF_VE</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>PRIX_UNIT</th>
              <th>QTE_STOCK</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["REF_VE"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["PRIX_UNIT"].'</td>
              <td>'.$ligne["QTE_STOCK"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="clientsta" method="POST" action="php/read.php">CLIENTS
      <?php

          $req = "SELECT * from clients";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_USER</th>
              <th>ADRESSE_CLI</th>
              <th>CP_CLI</th>
              <th>VILLE_CLI</th>
              <th>TEL_CLI</th>
              <th>NOM_USER</th>
              <th>PRENOM_USER</th>
              <th>EMAIL_USER</th>
              <th>MDP_USER</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["ADRESSE_CLI"].'</td>
              <td>'.$ligne["CP_CLI"].'</td>
              <td>'.$ligne["VILLE_CLI"].'</td>
              <td>'.$ligne["TEL_CLI"].'</td>
              <td>'.$ligne["NOM_USER"].'</td>
              <td>'.$ligne["PRENOM_USER"].'</td>
              <td>'.$ligne["EMAIL_USER"].'</td>
              <td>'.$ligne["MDP_USER"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>



      <form class="tableform" id="commandesta" method="POST" action="php/read.php">COMMANDES
      <?php

          $req = "SELECT * from commandes";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_COM</th>
              <th>REF_PANIER</th>
              <th>REF_USER</th>
              <th>DATE_COM</th>
              <th>MONTANT_HT</th>
              <th>MONTANT_TVA</th>
              <th>MONTANT_TTC</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_COM"].'</td>
              <td>'.$ligne["REF_PANIER"].'</td>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["DATE_COM"].'</td>
              <td>'.$ligne["MONTANT_HT"].'</td>
              <td>'.$ligne["MONTANT_TVA"].'</td>
              <td>'.$ligne["MONTANT_TTC"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="filmsta" method="POST" action="php/read.php">FILMS
      <?php

          $req = "SELECT * from films";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_ART</th>
              <th>FORMAT_FILM</th>
              <th>DUREE_FILM</th>
              <th>ARTISTE</th>
              <th>NOM_ACTEUR</th>
              <th>GENRE_FILM</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>PRIX_UNIT</th>
              <th>QTE_STOCK</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["FORMAT_FILM"].'</td>
              <td>'.$ligne["DUREE_FILM"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["NOM_ACTEUR"].'</td>
              <td>'.$ligne["GENRE_FILM"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["PRIX_UNIT"].'</td>
              <td>'.$ligne["QTE_STOCK"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="jeuxta" method="POST" action="php/read.php">JEUX
      <?php

          $req = "SELECT * from jeux";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_ART</th>
              <th>PLATFORM_JEU</th>
              <th>ARTISTE</th>
              <th>GENRE_JEU</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>PRIX_UNIT</th>
              <th>QTE_STOCK</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["PLATFORM_JEU"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["GENRE_JEU"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["PRIX_UNIT"].'</td>
              <td>'.$ligne["QTE_STOCK"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="musiquesta" method="POST" action="php/read.php">MUSIQUES
      <?php

          $req = "SELECT * from musiques";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_ART</th>
              <th>FORMAT_MUS</th>
              <th>ARTISTE</th>
              <th>CHANT_MUS</th>
              <th>GENRE_MUS</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>PRIX_VE</th>
              <th>QTE_STOCK</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["FORMAT_MUS"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["CHANT_MUS"].'</td>
              <td>'.$ligne["GENRE_MUS"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["PRIX_UNIT"].'</td>
              <td>'.$ligne["QTE_STOCK"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="newarticlesta" method="POST" action="php/read.php">NEWARTICLES
      <?php

          $req = "SELECT * from newarticles";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_VE</th>
              <th>REF_ART</th>
              <th>REF_USER</th>
              <th>REF_USER_1</th>
              <th>DATE_VEN</th>
              <th>NEW_VE</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>DATE_VER</th>
              <th>CONFIRM_VE</th>
              <th>PRIX_VE</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_VE"].'</td>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["REF_USER_1"].'</td>
              <td>'.$ligne["DATE_VEN"].'</td>
              <td>'.$ligne["NEW_VE"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["DATE_VER"].'</td>
              <td>'.$ligne["CONFIRM_VE"].'</td>
              <td>'.$ligne["PRIX_VE"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="newfilmsta" method="POST" action="php/read.php">NEWFILMS
      <?php

          $req = "SELECT * from newfilms";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_VE</th>
              <th>FORMAT_FILM</th>
              <th>DUREE_FILM</th>
              <th>ARTISTE</th>
              <th>NOM_ACTEUR</th>
              <th>GENRE_FILM</th>
              <th>DATE_VEN</th>
              <th>NEW_VE</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>DATE_VER</th>
              <th>CONFIRM_VE</th>
              <th>PRIX_VE</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_VE"].'</td>
              <td>'.$ligne["FORMAT_FILM"].'</td>
              <td>'.$ligne["DUR?E_FILM"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["NOM_ACTEUR"].'</td>
              <td>'.$ligne["GENRE_FILM"].'</td>
              <td>'.$ligne["DATE_VEN"].'</td>
              <td>'.$ligne["NEW_VE"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["DATE_VER"].'</td>
              <td>'.$ligne["CONFIRM_VE"].'</td>
              <td>'.$ligne["PRIX_VE"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="newjeuxta" method="POST" action="php/read.php">NEWJEUX
      <?php

          $req = "SELECT * from newjeux";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_VE</th>
              <th>PLATFORM_JEU</th>
              <th>ARTISTE</th>
              <th>GENRE_JEU</th>
              <th>DATE_VEN</th>
              <th>NEW_VE</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>DATE_VER</th>
              <th>CONFIRM_VE</th>
              <th>PRIX_VE</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_VE"].'</td>
              <td>'.$ligne["PLATFORM_JEU"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["GENRE_JEU"].'</td>
              <td>'.$ligne["DATE_VEN"].'</td>
              <td>'.$ligne["NEW_VE"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["DATE_VER"].'</td>
              <td>'.$ligne["CONFIRM_VE"].'</td>
              <td>'.$ligne["PRIX_VE"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="newmusiquesta" method="POST" action="php/read.php">NEWMUSIQUES
      <?php

          $req = "SELECT * from newmusiques";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_VE</th>
              <th>FORMAT_MUS</th>
              <th>ARTISTE</th>
              <th>CHANT_MUS</th>
              <th>GENRE_MUS</th>
              <th>DATE_VEN</th>
              <th>NEW_VE</th>
              <th>NOM_ART</th>
              <th>DESC_ART</th>
              <th>ANNEE_ART</th>
              <th>DATE_VER</th>
              <th>CONFIRM_VE</th>
              <th>PRIX_VE</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_VE"].'</td>
              <td>'.$ligne["FORMAT_MUS"].'</td>
              <td>'.$ligne["ARTISTE"].'</td>
              <td>'.$ligne["CHANT_MUS"].'</td>
              <td>'.$ligne["GENRE_MUS"].'</td>
              <td>'.$ligne["DATE_VEN"].'</td>
              <td>'.$ligne["NEW_VE"].'</td>
              <td>'.$ligne["NOM_ART"].'</td>
              <td>'.$ligne["DESC_ART"].'</td>
              <td>'.$ligne["ANNEE_ART"].'</td>
              <td>'.$ligne["DATE_VER"].'</td>
              <td>'.$ligne["CONFIRM_VE"].'</td>
              <td>'.$ligne["PRIX_VE"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="paniersta" method="POST" action="php/read.php">PANIERS
      <?php

          $req = "SELECT * from paniers";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_PANIER</th>
              <th>REF_USER</th>
              <th>ETAT_PANIER</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_PANIER"].'</td>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["ETAT_PANIER"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="selectionneta" method="POST" action="php/read.php">SELECTIONNE
      <?php

          $req = "SELECT * from selectionne";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_ART</th>
              <th>REF_PANIER</th>
              <th>QTE_CHOISI</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_ART"].'</td>
              <td>'.$ligne["REF_PANIER"].'</td>
              <td>'.$ligne["QTE_CHOISI"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>


      <form class="tableform" id="utilisateursta" method="POST" action="php/read.php">UTILISATEURS
      <?php

          $req = "SELECT * from utilisateurs";
          $prep = $dbh->query($req);

          echo '<table width="100%" border="1" cellpading="5" cellspacing="5">
            <tr>
              <th>REF_USER</th>
              <th>NOM_USER</th>
              <th>PRENOM_USER</th>
              <th>EMAIL_USER</th>
              <th>MDP_USER</th>
            </tr>';

          foreach($prep as $ligne)
          {
            echo'
            <tr>
              <td>'.$ligne["REF_USER"].'</td>
              <td>'.$ligne["NOM_USER"].'</td>
              <td>'.$ligne["PRENOM_USER"].'</td>
              <td>'.$ligne["EMAIL_USER"].'</td>
              <td>'.$ligne["MDP_USER"].'</td>
            </tr>';
          }
          echo '</table>';
      ?>
      </form>

      </div>


    <!-- JAVASCRIPT -->


      <script>

      var tableArray=[
        'administrateursta',
        'articlesta',
        'clientsta',
        'commandesta',
        'filmsta',
        'jeuxta',
        'musiquesta',
        'newarticlesta',
        'newfilmsta',
        'newjeuxta',
        'newmusiquesta',
        'paniersta',
        'selectionneta',
        'utilisateursta',
      ]

      var arrayLength=tableArray.length;

      function show(elem){
        for(i=0;i<arrayLength;i++){
          if(document.getElementById(tableArray[i]).style.display="inline-block"){
            document.getElementById(tableArray[i]).style.display="none";
          }
        }
        var x = document.getElementById(elem+"ta");

          if (x.style.display = "none") {
            x.style.display = "inline-block";
          }
      }

      </script>

    </body>

    </html>
