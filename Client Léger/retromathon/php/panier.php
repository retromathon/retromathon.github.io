<?php
/********************
 * Creation du panier s'il n'existe pas
 */
function creationPanier(){
   if (!isset($_SESSION['ref']))
      return false;
   
   //Connexion database
  try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }
 
   //Cherche panier actif pour le user
   $req = "SELECT * FROM paniers WHERE ETAT_PANIER=1 AND REF_USER= " . "'" . $_SESSION['ref'] . "'";
   $prep = $dbh->query($req);
   if($prep==false) //Erreur
   {
      echo 'Erreur Base de Donnees1';
      echo "test";
      die();  
   }

   $panier = $prep->fetch();


//echo 'COUNT PANIER='.count($panier);
//echo "lol";
//die();


   if(($panier==null)||(count($panier)==0)) //Panier inexistant
   {
      //Creation Panier pour le USER
        $req = "call new_paniers('" . $_SESSION['ref'] . "')";
      //$req = "INSERT INTO paniers (REF_USER, ETAT_PANIER) VALUES (".$_SESSION['ref'].", 1);";
      echo $req;
      $prep = $dbh->query($req);
      if($prep==false) //Erreur
      {
         echo 'Erreur Base de Donnees2';
         die();  
      }
      
      //Cherche a nouveau panier actif pour le user pour Lecture du ID du panier
      $req = "SELECT * FROM paniers WHERE ETAT_PANIER=1 AND REF_USER='" . $_SESSION['ref'] . "';";
      $prep = $dbh->query($req);
      if($prep==false) //Erreur
      {
         echo 'Erreur Base de Donnees3';
         die();  
      }
      $panier = $prep->fetch();
   }

   return $panier['REF_PANIER'];
}

/*****************************
 * Supression du panier
 */
function supprimePanier(){
   $idpanier=creationPanier();
   if($idpanier==false)
   {
      echo 'Probleme acces au panier.';
      die();  
   }

   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //Selection du id produit s'il existe dans le panier
   $req = "DELETE FROM selectionne WHERE REF_PANIER=".$idpanier.";";
   $prep = $dbh->query($req);
}

/***************************
 * Ajout d'un article au panier
 */
function ajouterArticle($id,$qteProduit){
   $idpanier=creationPanier();
   if($idpanier==false)
   {
      echo 'Probleme acces au panier.';
      die();  
   }

   echo 'debug1';
   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //Selection du id produit s'il existe dans le panier
   $req = "SELECT * FROM selectionne WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
   if($prep==false) //Erreur
   {
      echo 'Erreur Base de Donnees';
      die();  
   }
   $article = $prep->fetch();
   if(($article!=null)&&(count($article)!=0)) //Article existe
   {
      //On incremante la quantite
      $newQte=$article['QTE_CHOISI']+$qteProduit;
      $req = "UPDATE selectionne SET QTE_CHOISI=".$newQte." WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
      $prep = $dbh->exec($req);
      if($prep==0) //Erreur
      {
         echo 'Erreur Base de Donnees';
         die();  
      }
   }
   else //Article n'existe pas
   {
      //Ajout de l'article au panier
      $req = "INSERT INTO selectionne (REF_ART, REF_PANIER,QTE_CHOISI) VALUES ('".$id."',".$idpanier.",".$qteProduit.");";
      $prep = $dbh->exec($req);
      if($prep==0) //Erreur
      {
         echo 'Erreur INSERT Base de Donnees';
        die();  
      }
   }
}

function supprimerArticle($id){
   $idpanier=creationPanier();
if($idpanier==false)
   {
      echo 'Probleme acces au panier.';
      die();  
   }

   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //Supression
   $req = "DELETE FROM selectionne WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
}

function modifierQTeArticle($id,$qteProduit){
   $idpanier=creationPanier();
if($idpanier==false)
   {
      echo 'Probleme acces au panier.';
      die();  
   }

   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //On modifie la quantite
   $req = "UPDATE selectionne SET QTE_CHOISI=".$qteProduit." WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
}

function incremanteArticle($id){
   $idpanier=creationPanier();

   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //Selection du id produit s'il existe dans le panier
   $req = "SELECT * FROM selectionne WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
   if($prep==false) //Erreur
   {
      echo 'Erreur Base de Donnees';
      die();  
   }
   $article = $prep->fetch();
 
   //On incremante la quantite
   $newQte=$article['QTE_CHOISI']+1;
   $req = "UPDATE selectionne SET QTE_CHOISI=".$newQte." WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
}

function decremanteArticle($id){
   $idpanier=creationPanier();
   if($idpanier==false)
   {
      echo 'Probleme acces au panier.';
      die();  
   }

   //Connexion database
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
   }
   catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
   }

   //Selection du id produit s'il existe dans le panier
   $req = "SELECT * FROM selectionne WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
   $prep = $dbh->query($req);
   if($prep==false) //Erreur
   {
      echo 'Erreur Base de Donnees';
      die();  
   }
   $article = $prep->fetch();
 
   //On incremante la quantite
   $newQte=$article['QTE_CHOISI']-1;
   if($newQte>0) //UPDATE
   {
      $req = "UPDATE selectionne SET QTE_CHOISI=".$newQte." WHERE REF_PANIER=".$idpanier." AND REF_ART='".$id."';";
      $prep = $dbh->query($req);
   }
   else //DELETE
   {
      supprimerArticle($id);
   }
}

function passeCommande($ref_user){
   try {
      $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
    }
    catch( PDOException $Exception ) {
      echo $Exception->getMessage();
      die();
    }
    /*$req ="SELECT
          paniers.REF_PANIER,
          paniers.REF_USER,
          selectionne.REF_ART,
          selectionne.QTE_CHOISI,
          articles.PRIX_UNIT
        FROM
          paniers
        INNER JOIN selectionne ON selectionne.REF_PANIER = paniers.REF_PANIER
        INNER JOIN articles ON selectionne.REF_ART = articles.REF_ART
        WHERE
        paniers.REF_USER = '".$ref_user."' AND
        paniers.ETAT_PANIER = 1;";
   */

         $req ="SELECT REF_PANIER FROM paniers WHERE REF_USER = '".$ref_user."' AND ETAT_PANIER = 1;";

        $prep = $dbh->query($req);
        if($prep==false) //Erreur
        {
          echo 'Erreur requete count';
          die();  
        }

        $panierCommande = $prep->fetchall();

      //CREER COMMANDE
      $req = "call finalisation_commande(".$panierCommande[0][0].")";
      $prep = $dbh->query($req);
      if($prep==false) //Erreur
      {
         echo 'Erreur Base de Donnees2';
         die(); 
      } 

      //METTRE 0 dans paniers->ETAT_PANIER (panier fermer)
      /*$req = "UPDATE paniers SET ETAT_PANIER=0 WHERE REF_PANIER=".$panierCommande[0][0].";";
      $nbupd = $dbh->exec($req);
      if($nbupd==0) //Erreur
      {
         echo 'Erreur Base de Donnees '.$panierCommande[0][0];
         die();  
      }
      */

      //Lecture de REF_COMMANDE en fonction de ref_panier
    $req ="SELECT
          REF_COM
        FROM
          commandes
        WHERE REF_PANIER=".$panierCommande[0][0].";";
        $prep = $dbh->query($req);
        if($prep==false) //Erreur
        {
          echo 'Erreur requete select ref_com';
          die();  
        }  
        $resultreq = $prep->fetchall();
        $referenceCommande=$resultreq[0][0];

        //Mettre les articles de selectionne dans archives_selection
        $req = "call transfert_selection(".$referenceCommande.")";
      $prep = $dbh->query($req);
      if($prep==false) //Erreur
      {
         echo 'Erreur Base de Donnees transfert_selection()';
         die(); 
      } 
      //Supression des articles du panier
      $req = "call selection_delete(".$panierCommande[0][0].")";
      $prep = $dbh->query($req);
      if($prep==false) //Erreur
      {
         echo 'Erreur Base de Donnees selection_delete()';
         die(); 
      } 
}

?>