<?php

  session_start();

  if(isset($_POST['default'])){
  $_SESSION["isClicked"] = false;
  header('Location: index.php');
  exit();
}

if(!isset($_SESSION["isClicked"])){
  (boolean)$_SESSION["isClicked"] = false;
}

if($_SESSION["isClicked"] == FALSE){
  initDefault();
}

function initDefault(){

  try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
  }
  catch( PDOException $Exception ) {

      echo $Exception->getMessage();
      die();
  }

  $req = "SELECT ref_art, artiste, nom_art, prix_unit, 'films' as nomtable from films
    UNION SELECT ref_art, artiste, nom_art, prix_unit, 'jeux' as nomtable from jeux
    UNION SELECT ref_art, artiste, nom_art, prix_unit, 'musiques' as nomtable from musiques
    order by rand() limit 12";
    $prep = $dbh->query($req);

  $i = 1;
      foreach($prep as $ligne){

        $_SESSION["pro{$i}artiste"] = $ligne[1];
        $_SESSION["pro{$i}top"] = $ligne[2];
        $_SESSION["pro{$i}bottom"] = $ligne[3] . " €";
        $_SESSION["pro{$i}refarticle"] = $ligne[0];
        $_SESSION["pro{$i}genre"] = $ligne[4];

        $i++;
  }
}

//////// JEUX ////////

  if(isset($_POST['action'])){
    $formatArt = "jeux";
    $genreArt = "action";
    $formatGen = "GENRE_JEU";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['HacknSlash'])){
    $formatArt = "jeux";
    $genreArt = "HacknSlash";
    $formatGen = "GENRE_JEU";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['sandbox'])){
    $formatArt = "jeux";
    $genreArt = "sandbox";
    $formatGen = "GENRE_JEU";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['sports'])){
    $formatArt = "jeux";
    $genreArt = "sports";
    $formatGen = "GENRE_JEU";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

//////// FILMS ////////

  if(isset($_POST['Animation'])){
    $formatArt = "films";
    $genreArt = "Animation";
    $formatGen = "GENRE_FILM";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Aventure'])){
    $formatArt = "films";
    $genreArt = "Aventure";
    $formatGen = "GENRE_FILM";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Science-Fiction'])){
    $formatArt = "films";
    $genreArt = "Science-Fiction";
    $formatGen = "GENRE_FILM";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Superheros'])){
    $formatArt = "films";
    $genreArt = "Superheros";
    $formatGen = "GENRE_FILM";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

//////// MUSIQUES ////////

  if(isset($_POST['Electronic'])){
    $formatArt = "musiques";
    $genreArt = "Electronic";
    $formatGen = "GENRE_MUS";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Hip-Hop'])){
    $formatArt = "musiques";
    $genreArt = "Hip_Hop";
    $formatGen = "GENRE_MUS";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Jazz'])){
    $formatArt = "musiques";
    $genreArt = "Jazz";
    $formatGen = "GENRE_MUS";
    defineGenre($formatArt, $formatGen, $genreArt);
  }

  if(isset($_POST['Rock'])){
    $formatArt = "musiques";
    $genreArt = "Rock";
    $formatGen = "GENRE_MUS";
    defineGenre($formatArt, $formatGen, $genreArt);
  }


  function defineGenre($formatArticle, $formatGenre, $genreArticle){

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
    }
    catch( PDOException $Exception ) {

        echo $Exception->getMessage();
        die();
    }

// Effaçage des données présentes dans les fiches produit
      for($i = 1; $i <= 12; $i++){
        $_SESSION["pro{$i}artiste"] = "";
        $_SESSION["pro{$i}top"] = "";
        $_SESSION["pro{$i}bottom"] = "";
        $_SESSION["pro{$i}refarticle"] = "";
        $_SESSION["pro{$i}genre"] = "";

      }

// Récupération des articles sélectionnés, avec un max de 12
      $req = "SELECT *, '{$formatArticle}' as NOMTABLE from {$formatArticle} where {$formatGenre} = '{$genreArticle}' limit 12";
      $prep = $dbh->query($req);

// Insertion des données dans les fiches produit
  $i = 1;
      foreach($prep as $ligne){

        $_SESSION["pro{$i}artiste"] = $ligne["ARTISTE"];
        $_SESSION["pro{$i}top"] = $ligne["NOM_ART"];
        $_SESSION["pro{$i}bottom"] = $ligne["PRIX_UNIT"] . " €";
        $_SESSION["pro{$i}refarticle"] = $ligne["REF_ART"];
        $_SESSION["pro{$i}genre"] = $ligne["NOMTABLE"];

        $i++;
  }

      $_SESSION["isClicked"] = true;
      $_SESSION["reqs"] = $req;
      header('Location: index.php');
      exit();
  }

?>
