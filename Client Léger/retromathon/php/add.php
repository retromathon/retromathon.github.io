<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=retromathon', 'root', '');
}
catch( PDOException $Exception ) {

    echo $Exception->getMessage();
    die();
}

if(isset($_POST['envoyer1'])){

	$req = ("INSERT INTO administrateurs (REF_USER, NOM_USER, PRENOM_USER, EMAIL_USER, MDP_USER) VALUES (?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['adminrefuser'], $_POST['adminnomuser'], $_POST['adminprenomuser'], $_POST['adminemailuser'], $_POST['adminmdpuser']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}

if(isset($_POST['envoyer2'])){

	$req = ("INSERT INTO articles (REF_ART, REF_VE, NOM_ART, DESC_ART, ANNEE_ART, PRIX_UNIT, QTE_STOCK) VALUES (?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['articlesrefart'], $_POST['articlesrefve'], $_POST['articlesnomart'], $_POST['articlesdescart'], $_POST['articlesanneeart'], $_POST['articlesprixunit'], $_POST['articlesqtestock']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}

if(isset($_POST['envoyer3'])){

	$req = ("INSERT INTO clients () VALUES (?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['clientsrefuser'], $_POST['clientsadressecli'], $_POST['clientscpcli'], $_POST['clientsvillecli'], $_POST['clientstelcli'], $_POST['clientsnomuser'], $_POST['clientsprenomuser'], $_POST['clientsemailuser'], $_POST['clientsmdpuser']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}

if(isset($_POST['envoyer4'])){

	$req = ("INSERT INTO commandes () VALUES (?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['commandesrefcom'], $_POST['commandesrefpanier'], $_POST['commandesrefuser'], $_POST['commandesdatecom'], $_POST['commandesmontantht'], $_POST['commandesmontanttva'], $_POST['commandesmontantttc']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer5'])){

	$req = ("INSERT INTO films () VALUES (?,?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['filmsrefart'], $_POST['filmsformatfilm'], $_POST['filmsdureefilm'], $_POST['filmsnomrealisateur'], $_POST['filmsnomacteur'], $_POST['filmsgenrefilm'], $_POST['filmsnomart'], $_POST['filmsdescart'], $_POST['filmsanneeart'], $_POST['filmsprixunit'], $_POST['filmsqtestock']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer6'])){

	$req = ("INSERT INTO jeux () VALUES (?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['jeuxrefart'], $_POST['jeuxplatformjeu'], $_POST['jeuxstudiojeu'], $_POST['jeuxgenrejeu'], $_POST['jeuxnomart'], $_POST['jeuxdescart'], $_POST['jeuxanneeart'], $_POST['jeuxprixunit'], $_POST['jeuxqtestock']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer7'])){

	$req = ("INSERT INTO musiques () VALUES (?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['musiquesrefart'], $_POST['musiquesformatmus'], $_POST['musiquescomposmus'], $_POST['musiqueschantmus'], $_POST['musiquesgenremus'], $_POST['musiquesnomart'], $_POST['musiquesdescart'], $_POST['musiquesanneeart'], $_POST['musiquesprixunit'], $_POST['musiquesqtestock']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer8'])){

	$req = ("INSERT INTO newarticles () VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['newarticlesrefve'], $_POST['newarticlesrefart'], $_POST['newarticlesrefuser'], $_POST['newarticlesrefuser1'], $_POST['newarticlesdateven'], $_POST['newarticlesnewve'], $_POST['newarticlesnomart'], $_POST['newarticlesdescart'], $_POST['newarticlesanneeart'], $_POST['newarticlesdatever'], $_POST['newarticlesconfirmve'], $_POST['newarticlesprixve']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer9'])){

	$req = ("INSERT INTO newfilms () VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['newfilmsrefve'], $_POST['newfilmsformatfilm'], $_POST['newfilmsdureefilm'], $_POST['newfilmsnomrealisateur'], $_POST['newfilmsnomacteur'], $_POST['newfilmsgenrefilm'], $_POST['newfilmsdateven'], $_POST['newfilmsnewve'], $_POST['newfilmsnomart'], $_POST['newfilmsdescart'], $_POST['newfilmsanneeart'], $_POST['newfilmsdatever'], $_POST['newfilmsconfirmve'], $_POST['newfilmsprixve']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer10'])){

	$req = ("INSERT INTO newjeux () VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['newjeuxrefve'], $_POST['newjeuxplatformjeu'], $_POST['newjeuxstudiojeu'], $_POST['newjeuxgenrejeu'], $_POST['newjeuxdateven'], $_POST['newjeuxnewve'], $_POST['newjeuxnomart'], $_POST['newjeuxdescart'], $_POST['newjeuxanneeart'], $_POST['newjeuxdatever'], $_POST['newjeuxconfirmve'], $_POST['newjeuxprixve']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer11'])){

	$req = ("INSERT INTO newmusiques () VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['newmusiquesrefve'], $_POST['newmusiquesformatmus'], $_POST['newmusiquescomposmus'], $_POST['newmusiqueschantmus'], $_POST['newmusiquesgenremus'], $_POST['newmusiquesdateven'], $_POST['newmusiquesnewve'], $_POST['newmusiquesnomart'], $_POST['newmusiquesdescart'], $_POST['newmusiquesanneeart'], $_POST['newmusiquesdatever'], $_POST['newmusiquesconfirmve'], $_POST['newmusiquesprixve']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer12'])){

	$req = ("INSERT INTO paniers () VALUES (?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['paniersrefpanier'], $_POST['paniersrefuser'], $_POST['paniersetatpanier']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer13'])){

	$req = ("INSERT INTO selectionne () VALUES (?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['selectionnerefart'], $_POST['selectionnerefpanier'], $_POST['selectionneqtechoisi']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}


if(isset($_POST['envoyer14'])){

	$req = ("INSERT INTO utilisateurs () VALUES (?,?,?,?,?);");
	$sql = ($dbh->prepare($req));
	$sql -> execute(array($_POST['utilisateursrefuser'], $_POST['utilisateursnomuser'], $_POST['utilisateursprenomuser'], $_POST['utilisateursemailuser'], $_POST['utilisateursmdpuser']));

	header('Location: http://localhost/retromathon/merci.html');
	exit();
}

?>
