<html>
<!DOCTYPE HTML>
<head>
  <meta-charset="UTF-8">
  <title>Retromathon</title>
  <link rel="stylesheet" href="css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
</head>

<style>
.listeproduits{
  position:relative;
  display:block;
  height:80%;
  text-align:center;
  background-color:white;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
.lefttop{
  position:relative;
  flex-direction: column;
  height:20%;
  background-color:white;
  text-align:left;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
.genrebutton{
  text-decoration:none;
  margin-left:40px;
  margin-top:12px;
  font-size:20;
}
.maincontent{
  background-color:white;
  height:600px;
  width:800px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
</style>

<body>

  <?php
  session_start();

  if(!isset($_SESSION["active"])){
    (boolean)$_SESSION["active"] = false;
  }

  if(!isset($_SESSION["productSetup"])){
    (boolean)$_SESSION["productSetup"] = false;
  }

  if(isset($_SESSION["msg"])){
    if($_SESSION["msg"] == true){
      $_SESSION['msg'] = false;
      echo "<script type='text/javascript'>alert('" . "Bienvenue " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "');</script>";
    }

  }

  ?>

<div id="topbar"><div id="marque"><a href="index.php" style="text-decoration: none;"><h10>RETRO</h10><h11>mathon</h11></a></div>

<div id="search">
  <div class="searchbar">
    <input type="text" placeholder="Search..">
  </div>
</div>

<div id="panier">
    <div class="panier">
      <a href="PagePanier.php"><i class="fas fa-shopping-cart fa-3x"></i></a>
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
                    '<a href=""><p1 style="font-size:18;">Mon panier</p1></a><br>
                    <a href=""><p1 style="font-size:18;">Mes commandes</p1></a><br>
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

        <div class="lefttop">
            <button class="genrebutton" id="jeux" type="submit" onclick="genres(this.id)" name="jeux">JEUX</button><br>
            <button class="genrebutton" id="films" type="submit" onclick="genres(this.id)" name="films">FILMS</button><br>
            <button class="genrebutton" id="musiques" type="submit" onclick="genres(this.id)" name="musiques">ALBUMS</button><br>
        </div>

        <div class="listeproduits">
          <form method="post" class="jeux hidden">
            <button class="prodbutton" type="submit" name="diablo">Diablo</button><br>
            <button class="prodbutton" type="submit" name="linkthefacesofevil">Link: The Faces of Evil</button><br>
            <button class="prodbutton" type="submit" name="minecraft">Minecraft</button><br>
            <button class="prodbutton" type="submit" name="trackandfield">Track & Field</button><br>
          </form>
          <form method="post" class="films hidden">
            <button class="prodbutton" type="submit" name="jurassic">Jurassic Park</button><br>
            <button class="prodbutton" type="submit" name="shrek">Shrek</button><br>
            <button class="prodbutton" type="submit" name="2001lodysseedelespace">2001 L'Odyssée de L'Espace</button><br>
            <button class="prodbutton" type="submit" name="avengersendgame">Avengers: Endgame</button><br>
          </form>
          <form method="post" class="musiques hidden">
            <button class="prodbutton" type="submit" name="invisibletouch">Invisible Touch</button><br>
            <button class="prodbutton" type="submit" name="myfavoritethings">My Favorite Things</button><br>
            <button class="prodbutton" type="submit" name="enterthewutang">Enter The Wu-Tang</button><br>
            <button class="prodbutton" type="submit" name="selectedambientworks">Selected Ambient Works 85-92</button><br>
          </form>
        </div>
      </div>

<!-- FICHE PRODUIT -->

      <div class="maincontent">

          <?php
          if($_SESSION["productSetup"] == false){
            displayProduct($_GET['genre'], $_GET['produit']);
            $_SESSION["productSetup"] = true;
          }

          if(isset($_POST['diablo'])){
            displayProduct('jeux', 'j1');
          }
          if(isset($_POST['linkthefacesofevil'])){
            displayProduct('jeux', 'j2');
          }
          if(isset($_POST['minecraft'])){
            displayProduct('jeux', 'j3');
          }
          if(isset($_POST['trackandfield'])){
            displayProduct('jeux', 'j4');
          }


          if(isset($_POST['jurassic'])){
            displayProduct('films', 'f2');
          }
          if(isset($_POST['shrek'])){
            displayProduct('films', 'f1');
          }
          if(isset($_POST['2001lodysseedelespace'])){
            displayProduct('films', "f3");
          }
          if(isset($_POST['avengersendgame'])){
            displayProduct('films', 'f4');
          }


          if(isset($_POST['invisibletouch'])){
            displayProduct('musiques', 'm2');
          }
          if(isset($_POST['myfavoritethings'])){
            displayProduct('musiques', 'm1');
          }
          if(isset($_POST['enterthewutang'])){
            displayProduct('musiques', 'm3');
          }
          if(isset($_POST['selectedambientworks'])){
            displayProduct('musiques', 'm4');
          }

          function displayProduct($genre, $x){
            if(isset($_SESSION["productSetup"])){
              $_SESSION["productSetup"] = true;
            }

            try {
                $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
            }
            catch( PDOException $Exception ) {
                echo $Exception->getMessage();
                die();
            }
            $_SESSION["genre"] = $genre;
            $_SESSION["produit"] = $x;

            $req = "SELECT * from {$_SESSION["genre"]} where ref_art = " . '"' . $_SESSION["produit"] . '"';
            $res = $dbh->query($req)->fetch();

            if($genre == "jeux"){
              echo '<div class="infoproduct"><t2>' .
                   "Jeu : " . $res[4] . "<br><br>" .
                   "Genre : " . $res[3] . "<br><br>" .
                   "Plate-forme : " . $res[1] . "<br><br>" .
                   "Studio : " . $res[2] . "<br><br>" .
                   "Année de sortie : " . $res[6] . "<br><br>" .
                   "Prix unitaire : " . $res[7] . "<br><br>";
              if($res[8] > 0){
                echo "En stock";
              }
              else{
                echo "Stock épuisé";
              }
              echo '</t2></div>
                    <div class ="productsummary"><t2>' . $res[5] . '</t2></div>';
            }


            if($genre == "films"){
              echo '<div class="infoproduct"><t2>' .
                   "Film : " . $res[6] . "<br><br>" .
                   "Genre : " . $res[5] . "<br><br>" .
                   "Réalisateur : " . $res[3] . "<br><br>" .
                   "Acteur principal : " . $res[4] . "<br><br>" .
                   "Année de sortie : " . $res[8] . "<br><br>" .
                   "Prix unitaire : " . $res[9] . "<br><br>";
              if($res[10] > 0){
                echo "En stock";
              }
              else{
                echo "Stock épuisé";
              }
              echo '</t2></div>
                    <div class ="productsummary"><t2>' . $res[7] . '</t2></div>';
            }


            if($genre == "musiques"){
              echo '<div class="infoproduct"><t2>' .
                   "Album : " . $res[5] . "<br><br>" .
                   "Genre : " . $res[4] . "<br><br>" .
                   "Artiste : " . $res[2] . "<br><br>" .
                   "Chanteur : " . $res[3] . "<br><br>" .
                   "Format : " . $res[1] . "<br><br>" .
                   "Année de sortie : " . $res[7] . "<br><br>" .
                   "Prix unitaire : " . $res[8] . "<br><br>";
              if($res[9] > 0){
                echo "En stock";
              }
              else{
                echo "Stock épuisé";
              }
              echo '</t2></div>
                    <div class ="productsummary"><t2>' . $res[6] . '</t2></div>';
            }

            if($_SESSION["active"] == true){
              echo '<button type="submit" class="btn red productbutton">Commander Maintenant</button>';
            }
            else{
              echo '<a href="login.php" class="btn blue productbutton">Se connecter</a>';
            }
          }
          ?>
      </div>
    </div>
  </section>

</body>

<script>
function genres(elem){
  var colArray = ["jeux", "films", "musiques"];

  for(var i = 0; i < 3; i++){
    var li = document.getElementsByClassName(colArray[i]);
    if (li[0].classList.contains("hidden")==false){
          li[0].classList.add("hidden");
    }
  }

var x = document.getElementsByClassName(elem);

  if (x[0].classList.contains("hidden") == true) {
    x[0].classList.remove("hidden");
  }
}
</script>
</html>
