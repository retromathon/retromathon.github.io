<html>
<!DOCTYPE HTML>
<head>
  <meta charset="UTF-8">
  <title>Retromathon</title>
  <link rel="stylesheet" href="css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
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
    require "php/panier.php";
    include 'productgenres.php';

    //Nouveau produit en parametre ?
    if (isset($_SESSION['ref'])&&(isset($_GET["idarticle"]))&&(isset($_GET["qteProduit"]))){
        ajouterArticle($_GET["idarticle"],$_GET["qteProduit"]);
    }

  if(!isset($_SESSION["active"])){
    (boolean)$_SESSION["active"] = false;
  }

  if(isset($_SESSION["productSetup"])){
    $_SESSION["productSetup"] = false;
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
        <!--<input type="text" placeholder="Search.."> -->
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

        <form method="post"><input class="genrebutton" type="submit" value="Réinitialiser" name="default"></input></form>

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

<!-- FICHES PRODUITS -->

      <div class="maincontent">
        <div class="row">
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro1refarticle"]}&genre={$_SESSION["pro1genre"]}'>";?> <div class="producttop"><br><?php echo "{$_SESSION["pro1artiste"]} <br><br> <t2>{$_SESSION["pro1top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro1bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro1refarticle"] ?>', '<?php echo addslashes($_SESSION["pro1top"]) ?>',1, '<?php echo $_SESSION["pro1bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro2refarticle"]}&genre={$_SESSION["pro2genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro2artiste"]} <br><br> <t2>{$_SESSION["pro2top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro2bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro2refarticle"] ?>', '<?php echo addslashes($_SESSION["pro2top"]) ?>',1, '<?php echo $_SESSION["pro2bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro3refarticle"]}&genre={$_SESSION["pro3genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro3artiste"]} <br><br> <t2>{$_SESSION["pro3top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro3bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro3refarticle"] ?>', '<?php echo addslashes($_SESSION["pro3top"]) ?>',1, '<?php echo $_SESSION["pro3bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro4refarticle"]}&genre={$_SESSION["pro4genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro4artiste"]} <br><br> <t2>{$_SESSION["pro4top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro4bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro4refarticle"] ?>', '<?php echo addslashes($_SESSION["pro4top"]) ?>',1, '<?php echo $_SESSION["pro4bottom"] ?>')">Add</button></div></div>
        </div>

        <div class="row">
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro5refarticle"]}&genre={$_SESSION["pro5genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro5artiste"]} <br><br> <t2>{$_SESSION["pro5top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro5bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro5refarticle"] ?>', '<?php echo addslashes($_SESSION["pro5top"]) ?>',1, '<?php echo $_SESSION["pro5bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro6refarticle"]}&genre={$_SESSION["pro6genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro6artiste"]} <br><br> <t2>{$_SESSION["pro6top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro6bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro6refarticle"] ?>', '<?php echo addslashes($_SESSION["pro6top"]) ?>',1, '<?php echo $_SESSION["pro6bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro7refarticle"]}&genre={$_SESSION["pro7genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro7artiste"]} <br><br> <t2>{$_SESSION["pro7top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro7bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro7refarticle"] ?>', '<?php echo addslashes($_SESSION["pro7top"]) ?>',1, '<?php echo $_SESSION["pro7bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro8refarticle"]}&genre={$_SESSION["pro8genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro8artiste"]} <br><br> <t2>{$_SESSION["pro8top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro8bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro8refarticle"] ?>', '<?php echo addslashes($_SESSION["pro8top"]) ?>',1, '<?php echo $_SESSION["pro8bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro9refarticle"]}&genre={$_SESSION["pro9genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro9artiste"]} <br><br> <t2>{$_SESSION["pro9top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro9bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro9refarticle"] ?>', '<?php echo addslashes($_SESSION["pro9top"]) ?>',1, '<?php echo $_SESSION["pro9bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro10refarticle"]}&genre={$_SESSION["pro10genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro10artiste"]} <br><br> <t2>{$_SESSION["pro10top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro10bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro10refarticle"] ?>', '<?php echo addslashes($_SESSION["pro10top"]) ?>',1, '<?php echo $_SESSION["pro10bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro11refarticle"]}&genre={$_SESSION["pro11genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro11artiste"]} <br><br> <t2>{$_SESSION["pro11top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro11bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro11refarticle"] ?>', '<?php echo addslashes($_SESSION["pro11top"]) ?>',1, '<?php echo $_SESSION["pro11bottom"] ?>')">Add</button></div></div>
          <div class="product" style="background-color:white;"> <?php echo "<a href='product.php?produit={$_SESSION["pro12refarticle"]}&genre={$_SESSION["pro12genre"]}'>"?> <div class="producttop"><br><?php echo "{$_SESSION["pro12artiste"]} <br><br> <t2>{$_SESSION["pro12top"]}</t2>"; ?></div><div class="productinfo"><?php echo "<t2>{$_SESSION["pro12bottom"]}</t2>"; ?><br><br></a><button onClick="clickButtonAddPanier('<?php echo $_SESSION["pro12refarticle"] ?>', '<?php echo addslashes($_SESSION["pro12top"]) ?>',1, '<?php echo $_SESSION["pro12bottom"] ?>')">Add</button></div></div>
        </div>

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

  function clickButtonAddPanier(idarticle,libelleProduit,qteProduit,prixUnitaireProduit){
    window.location='index.php?idarticle='+idarticle+'&qteProduit='+qteProduit;
  }

  </script>



</body>

</html>
