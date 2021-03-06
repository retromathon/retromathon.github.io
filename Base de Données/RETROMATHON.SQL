/* 	
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Cr�ation de la base
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

DROP DATABASE IF EXISTS Retromathon;
CREATE DATABASE IF NOT EXISTS Retromathon;
USE Retromathon;



-- *********************************************************************************



/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Cr�ation des tables
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

-- par question de s�curit�, attention au type et � la limite du password!
CREATE TABLE IF NOT EXISTS UTILISATEURS
(
	REF_USER VARCHAR(6) NOT NULL,
	NOM_USER VARCHAR(20) NOT NULL,
	PRENOM_USER VARCHAR(20),
	EMAIL_USER VARCHAR(45) NOT NULL,
	MDP_USER CHAR(20) NOT NULL,
	PRIMARY KEY(REF_USER) 
);

-- REMARQUE : vu que mysql g�re mal les h�ritages avec les cl�s �trang�res active, je dois les supprimer. Ce sera compens� par les triggers.
CREATE TABLE IF NOT EXISTS ADMINISTRATEURS
(
	REF_USER VARCHAR(6) NOT NULL,
	NOM_USER VARCHAR(20) NOT NULL,
	PRENOM_USER VARCHAR(20),
	EMAIL_USER VARCHAR(45) NOT NULL,
	MDP_USER CHAR(20) NOT NULL,
	PRIMARY KEY(REF_USER)
);

CREATE TABLE IF NOT EXISTS CLIENTS
(
	REF_USER VARCHAR(6) NOT NULL,
	ADRESSE_CLI VARCHAR(40) NOT NULL,
	CP_CLI INTEGER(5) NOT NULL,
	VILLE_CLI VARCHAR(30) NOT NULL,
	TEL_CLI INTEGER(10) NOT NULL,
	NOM_USER VARCHAR(20) NOT NULL,
	PRENOM_USER VARCHAR(20),
	NB_COM INTEGER(3) DEFAULT 0,
	EMAIL_USER VARCHAR(45) NOT NULL,
	MDP_USER CHAR(20) NOT NULL, 
	PRIMARY KEY(REF_USER)
);



CREATE TABLE IF NOT EXISTS ARTICLES
(
	REF_ART VARCHAR(6) NOT NULL,
	NOM_ART VARCHAR(30) NOT NULL,
	ARTISTE VARCHAR(40),
	DESC_ART VARCHAR(255),
	ANNEE_ART DATE NULL,
	PRIX_UNIT DECIMAL(5,2) NOT NULL,
	QTE_STOCK INTEGER(2) NOT NULL, 
	PRIMARY KEY(REF_ART)	
);

-- H = copie de l'original pour historiser
CREATE TABLE IF NOT EXISTS H_ARTICLES
(
	H_REF_ART VARCHAR(6) NOT NULL,
	DATE_HISTO DATE NOT NULL  ,
	NOM_ART VARCHAR(30) NOT NULL,
	ARTISTE VARCHAR(40),
	DESC_ART VARCHAR(255),
	ANNEE_ART DATE NULL,
	PRIX_UNIT DECIMAL(5,2) NOT NULL,
	QTE_STOCK INTEGER(2) NOT NULL, 
	PRIMARY KEY(H_REF_ART, DATE_HISTO)
);

-- REMARQUE : m�me probl�me que les tables user, donc suppresion des foreign keys
CREATE TABLE IF NOT EXISTS MUSIQUES
(
	REF_ART VARCHAR(6) NOT NULL,
	FORMAT_MUS VARCHAR(20),
	ARTISTE VARCHAR(40),
	CHANT_MUS VARCHAR(40),
	GENRE_MUS VARCHAR(20),
	NOM_ART VARCHAR(30) NOT NULL,
	DESC_ART VARCHAR(255),
	ANNEE_ART DATE,
	PRIX_UNIT DECIMAL(5,2) NOT NULL,
	QTE_STOCK INTEGER(2) NOT NULL, 
	PRIMARY KEY(REF_ART)
);

CREATE TABLE IF NOT EXISTS FILMS
(
	REF_ART VARCHAR(6) NOT NULL,
	FORMAT_FILM VARCHAR(20),
	DUREE_FILM TIME,
	ARTISTE VARCHAR(40),
	NOM_ACTEUR VARCHAR(60),
	GENRE_FILM VARCHAR(20),
	NOM_ART VARCHAR(30) NOT NULL,
	DESC_ART VARCHAR(255),
	ANNEE_ART DATE,
	PRIX_UNIT DECIMAL(5,2) NOT NULL,
	QTE_STOCK INTEGER(2) NOT NULL, 
	PRIMARY KEY(REF_ART)
);

CREATE TABLE IF NOT EXISTS JEUX
(
	REF_ART VARCHAR(6) NOT NULL,
	PLATFORM_JEU VARCHAR(20),
	ARTISTE VARCHAR(40),
	GENRE_JEU VARCHAR(20),
	NOM_ART VARCHAR(30) NOT NULL,
	DESC_ART VARCHAR(255),
	ANNEE_ART DATE,
	PRIX_UNIT DECIMAL(5,2) NOT NULL,
	QTE_STOCK INTEGER(2) NOT NULL,
	PRIMARY KEY(REF_ART)
);
	
-- revente par les clients. ACTUELLEMENT NON-UTILISE.
CREATE TABLE IF NOT EXISTS PROPOSE
(
	REF_USER VARCHAR(6) NOT NULL,
	REF_ART VARCHAR(6) NOT NULL,
	REF_VE INTEGER(4) NOT NULL,
	DATE_VE DATE NOT NULL,
	PRIX_VE DECIMAL(5,2),
	PRIMARY KEY(REF_USER,REF_ART),
	FOREIGN KEY(REF_USER) REFERENCES CLIENTS(REF_USER),
	FOREIGN KEY(REF_ART) REFERENCES ARTICLES(REF_ART)
);

-- sur le site, la selection d'un article (+ sa quantit�) cause une insertion; voir proc�dure stock�e
CREATE TABLE IF NOT EXISTS PANIERS
(
	REF_PANIER INTEGER(6) AUTO_INCREMENT NOT NULL,
	REF_USER VARCHAR(6) NOT NULL,
	ETAT_PANIER BOOL DEFAULT TRUE, 
	PRIMARY KEY(REF_PANIER),
	FOREIGN KEY(REF_USER) REFERENCES CLIENTS(REF_USER)
);

-- idem ici
CREATE TABLE IF NOT EXISTS SELECTIONNE
(
	REF_ART VARCHAR(6) NOT NULL,
	REF_PANIER INTEGER(6) NOT NULL,
	QTE_CHOISI SMALLINT(1) DEFAULT 1, 
	PRIMARY KEY(REF_ART, REF_PANIER),
	FOREIGN KEY(REF_ART) REFERENCES ARTICLES(REF_ART),
	FOREIGN KEY(REF_PANIER) REFERENCES PANIERS(REF_PANIER)
);

CREATE TABLE IF NOT EXISTS H_SELECTIONNE
(
	H_REF_ART VARCHAR(6) NOT NULL,
	H_REF_PANIER INTEGER(6) NOT NULL,
	DATE_HISTO DATE NOT NULL,
	QTE_CHOISI SMALLINT(1) DEFAULT 1, 
	PRIMARY KEY(H_REF_ART, H_REF_PANIER, DATE_HISTO),
	FOREIGN KEY(H_REF_ART) REFERENCES ARTICLES(REF_ART),
	FOREIGN KEY(H_REF_PANIER) REFERENCES PANIERS(REF_PANIER)
);

CREATE TABLE IF NOT EXISTS COMMANDES
(
	REF_COM INTEGER(6) AUTO_INCREMENT NOT NULL,
	REF_PANIER INTEGER(6) NOT NULL,
	REF_USER VARCHAR(6) NOT NULL,
	DATE_COM DATE NOT NULL,
	MONTANT_HT DECIMAL(7,2) NOT NULL,
	MONTANT_TVA DECIMAL(6,2),
	MONTANT_TTC DECIMAL(7,2), 
	PRIMARY KEY(REF_COM),
	FOREIGN KEY(REF_PANIER) REFERENCES PANIERS(REF_PANIER),
	FOREIGN KEY(REF_USER) REFERENCES CLIENTS(REF_USER)
);

CREATE TABLE IF NOT EXISTS H_COMMANDES
(
	H_REF_COM INTEGER(6) AUTO_INCREMENT NOT NULL,
	DATE_HISTO DATE NOT NULL,
	REF_PANIER INTEGER(6) NOT NULL,
	REF_USER VARCHAR(6) NOT NULL,
	DATE_COM DATE NOT NULL,
	MONTANT_HT DECIMAL(7,2) NOT NULL,
	MONTANT_TVA DECIMAL(6,2),
	MONTANT_TTC DECIMAL(7,2), 
	PRIMARY KEY(H_REF_COM, DATE_HISTO),
	FOREIGN KEY(REF_PANIER) REFERENCES PANIERS(REF_PANIER),
	FOREIGN KEY(REF_USER) REFERENCES CLIENTS(REF_USER)
);

-- supression du foreign key REF_COM
-- potentiellement inutile, � supprimer?
CREATE TABLE IF NOT EXISTS ARCHIVE_SELECTION 
(
	REF_COM INTEGER(6) NOT NULL,
	REF_ART VARCHAR(6) NOT NULL,
	QTE_CHOISI SMALLINT(1) DEFAULT 1, 
	PRIMARY KEY(REF_COM, REF_ART),
	FOREIGN KEY(REF_ART) REFERENCES ARTICLES(REF_ART)
);



-- *********************************************************************************



/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Cr�ation des proc�dures stock�es
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
� ajouter : NEW_ARTICLES, modif_selection, delete_selection, etc
Ne PAS ajouter une proc�dure pour toute ajout/modification li� aux admins, par question de s�curit�!
*/

-- nouveau client
drop procedure if exists NEW_CLIENT;
DELIMITER //
create procedure NEW_CLIENT(IN num_client varchar(6), IN adresse varchar(40), IN code_postal int(5), IN ville varchar(30), IN telephone int(10), IN nom_client varchar(20), IN prenom_client varchar(20), IN email varchar(45), IN password varchar(255))
begin
	insert into CLIENTS values(num_client, adresse, code_postal, ville, telephone, nom_client, prenom_client, 0, email, password);
end //
DELIMITER ;

-- lors de l'authentification d'un client
drop procedure if exists NEW_PANIERS;
DELIMITER //
create procedure NEW_PANIERS(IN num_client varchar(6))
begin
	declare panier_valide BOOL;
	select ETAT_PANIER into panier_valide from PANIERS where REF_USER = num_client AND ETAT_PANIER = TRUE;
	if(panier_valide is null)
	then
		insert into PANIERS(REF_USER) values(num_client);
	end if;
end //
DELIMITER ;

-- lorsque le client s�lectionne un article + sa quantite, et le met dans son panier
drop procedure if exists NEW_SELECTION;
DELIMITER //
create procedure NEW_SELECTION(IN num_article varchar(6), IN num_panier int(6), IN quantite SMALLINT(1))
begin
	insert into SELECTIONNE(REF_ART, REF_PANIER, QTE_CHOISI) values(num_article, num_panier, quantite);
end //
DELIMITER ;

-- lorsque le client confirme sa commande
drop procedure if exists FINALISATION_COMMANDE;
DELIMITER //
create procedure FINALISATION_COMMANDE(IN num_panier int(6))
begin
	declare num_client varchar(6);
	declare montant DECIMAL(7,2);

	select REF_USER into num_client from PANIERS where REF_PANIER = num_panier AND ETAT_PANIER = TRUE;
	if(num_client is not null)
	then
		select SUM(PRIX_UNIT * QTE_CHOISI) into montant 
		from ARTICLES A, SELECTIONNE S
		where A.REF_ART = S.REF_ART AND REF_PANIER = num_panier;
		insert into COMMANDES(REF_PANIER, REF_USER, DATE_COM, MONTANT_HT, MONTANT_TVA, MONTANT_TTC) values
		-- � MODIFIER, SACHANT QUE LA TVA EST INCLUE DANS LE PRIX UNITAIRE
		(num_panier, num_client, CURDATE(), montant, montant * 0.2, montant * 1.2);
	else
		SIGNAL sqlstate "45000"
		set MESSAGE_TEXT = "PANIER VIDE OU CLIENT INEXISTENT!";
	end if;
end //
DELIMITER ;

-- archivage des selections
drop procedure if exists TRANSFERT_SELECTION;
DELIMITER //
create procedure TRANSFERT_SELECTION(IN num_commande int(6))
begin
	declare fini int default 0;
	declare num_article varchar(6);
	declare quantite SMALLINT(1);
	declare INSERT_ARCHIVE CURSOR for 
	select REF_ART, QTE_CHOISI from SELECTIONNE S, COMMANDES C
	where S.REF_PANIER = C.REF_PANIER and C.REF_COM = num_commande;
	declare CONTINUE handler for not found set fini=1; 
	
	open INSERT_ARCHIVE;
		fetch INSERT_ARCHIVE into num_article, quantite;
		while fini!=1 do
			insert into ARCHIVE_SELECTION(REF_COM, REF_ART, QTE_CHOISI) values
			(num_commande, num_article, quantite);
			fetch INSERT_ARCHIVE into num_article, quantite;
		end while;
	close INSERT_ARCHIVE;
end //
DELIMITER ;

-- suppresion des selections (on vide le panier du client en gros)
drop procedure if exists SELECTION_DELETE;
DELIMITER //
create procedure SELECTION_DELETE(IN num_panier int(6))
begin
	delete from SELECTIONNE where REF_PANIER = num_panier;
end //
DELIMITER ;

/*
-- calcul des montants de la selection actuelle
drop procedure if exists CALCUL_SELECTION;
DELIMITER //
create procedure CALCUL_SELECTION(IN num_panier int(6), OUT sub_tot DECIMAL(7,2), OUT montant_tva)
*/



-- *********************************************************************************



/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Cr�ation des triggers
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

-- gestion des h�ritages des utilisateurs
drop trigger if exists  ADMINISTRATEURS_INSERT;
DELIMITER //
create trigger ADMINISTRATEURS_INSERT
after insert on ADMINISTRATEURS
for each row
begin
	insert into UTILISATEURS values (new.REF_USER, new.NOM_USER, new.PRENOM_USER, new.EMAIL_USER, new.MDP_USER);
end //
DELIMITER ;

drop trigger if exists ADMINISTRATEURS_UPDATE;
DELIMITER //
create trigger ADMINISTRATEURS_UPDATE
after update on ADMINISTRATEURS 
for each row
begin
	update UTILISATEURS
	set NOM_USER = new.NOM_USER, PRENOM_USER = new.PRENOM_USER, EMAIL_USER = new.EMAIL_USER, MDP_USER = new.MDP_USER
	where REF_USER = old.REF_USER;
end //
DELIMITER ;

drop trigger if exists ADMINISTRATEURS_DELETE;
DELIMITER //
create trigger ADMINISTRATEURS_DELETE
after delete on ADMINISTRATEURS
for each row
begin
	delete from UTILISATEURS
	where REF_USER = old.REF_USER;
end //
DELIMITER ;

drop trigger if exists  CLIENTS_INSERT;
DELIMITER //
create trigger CLIENTS_INSERT
after insert on CLIENTS
for each row
begin
	insert into UTILISATEURS values (new.REF_USER, new.NOM_USER, new.PRENOM_USER, new.EMAIL_USER, new.MDP_USER);
end //
DELIMITER ;

drop trigger if exists CLIENTS_UPDATE;
DELIMITER //
create trigger CLIENTS_UPDATE
after update on CLIENTS 
for each row
begin
	update UTILISATEURS
	set NOM_USER = new.NOM_USER, PRENOM_USER = new.PRENOM_USER, EMAIL_USER = new.EMAIL_USER, MDP_USER = new.MDP_USER
	where REF_USER = old.REF_USER;
end //
DELIMITER ;

drop trigger if exists CLIENTS_DELETE;
DELIMITER //
create trigger CLIENTS_DELETE
after delete on CLIENTS
for each row
begin
	delete from UTILISATEURS
	where REF_USER = old.REF_USER;
end //
DELIMITER ;


-- gestion des h�ritages des articles
drop trigger if exists  HISTO_ARTICLE;
DELIMITER //
create trigger HISTO_ARTICLE
after insert on ARTICLES
for each row
begin
	insert into H_ARTICLES values (new.REF_ART, CURDATE(), new.NOM_ART, new.ARTISTE, new.DESC_ART, new.ANNEE_ART, new.PRIX_UNIT, new.QTE_STOCK);
end //
DELIMITER ;

drop trigger if exists  MUSIQUES_INSERT;
DELIMITER //
create trigger MUSIQUES_INSERT
after insert on MUSIQUES
for each row
begin
	insert into ARTICLES values (new.REF_ART, new.NOM_ART, new.ARTISTE, new.DESC_ART, new.ANNEE_ART, new.PRIX_UNIT, new.QTE_STOCK);
end //
DELIMITER ;

drop trigger if exists MUSIQUES_UPDATE;
DELIMITER //
create trigger MUSIQUES_UPDATE
after update on MUSIQUES 
for each row
begin
	update ARTICLES
	set NOM_ART = new.NOM_ART, ARTISTE = new.ARTISTE, DESC_ART = new.DESC_ART, ANNEE_ART = new.ANNEE_ART, PRIX_UNIT = new.PRIX_UNIT, QTE_STOCK = new.QTE_STOCK
	where REF_ART = old.REF_ART;
end //
DELIMITER ;

drop trigger if exists MUSIQUES_DELETE;
DELIMITER //
create trigger MUSIQUES_DELETE
after delete on MUSIQUES
for each row
begin
	delete from ARTICLES
	where REF_ART = old.REF_ART;
end //
DELIMITER ;

drop trigger if exists  FILMS_INSERT;
DELIMITER //
create trigger FILMS_INSERT
after insert on FILMS
for each row
begin
	insert into ARTICLES values (new.REF_ART, new.NOM_ART, new.ARTISTE, new.DESC_ART, new.ANNEE_ART, new.PRIX_UNIT, new.QTE_STOCK);
end //
DELIMITER ;

drop trigger if exists FILMS_UPDATE;
DELIMITER //
create trigger FILMS_UPDATE
after update on FILMS 
for each row
begin
	update ARTICLES
	set NOM_ART = new.NOM_ART, ARTISTE = new.ARTISTE, DESC_ART = new.DESC_ART, ANNEE_ART = new.ANNEE_ART, PRIX_UNIT = new.PRIX_UNIT, QTE_STOCK = new.QTE_STOCK
	where REF_ART = old.REF_ART;
end //
DELIMITER ;

drop trigger if exists FILMS_DELETE;
DELIMITER //
create trigger FILMS_DELETE
after delete on FILMS
for each row
begin
	delete from ARTICLES
	where REF_ART = old.REF_ART;
end //
DELIMITER ;

drop trigger if exists  JEUX_INSERT;
DELIMITER //
create trigger JEUX_INSERT
after insert on JEUX
for each row
begin
	insert into ARTICLES values (new.REF_ART, new.NOM_ART, new.ARTISTE, new.DESC_ART, new.ANNEE_ART, new.PRIX_UNIT, new.QTE_STOCK);
end //
DELIMITER ;

drop trigger if exists JEUX_UPDATE;
DELIMITER //
create trigger JEUX_UPDATE
after update on JEUX 
for each row
begin
	update ARTICLES
	set NOM_ART = new.NOM_ART, ARTISTE = new.ARTISTE, DESC_ART = new.DESC_ART, ANNEE_ART = new.ANNEE_ART, PRIX_UNIT = new.PRIX_UNIT, QTE_STOCK = new.QTE_STOCK
	where REF_ART = old.REF_ART;
end //
DELIMITER ;

drop trigger if exists JEUX_DELETE;
DELIMITER //
create trigger JEUX_DELETE
after delete on JEUX
for each row
begin
	delete from ARTICLES
	where REF_ART = old.REF_ART;
end //
DELIMITER ;


-- h�ritages des commandes & selections historis�
drop trigger if exists  HISTO_SELECTIONNE;
DELIMITER //
create trigger HISTO_SELECTIONNE
after insert on SELECTIONNE
for each row
begin
	insert into H_SELECTIONNE values (new.REF_ART, new.REF_PANIER, CURDATE(), new.QTE_CHOISI);
end //
DELIMITER ;

drop trigger if exists  HISTO_COMMANDES;
DELIMITER //
create trigger HISTO_COMMANDES
after insert on COMMANDES
for each row
begin
	insert into H_COMMANDES values (new.REF_COM, CURDATE(), new.REF_PANIER, new.REF_USER, new.DATE_COM, new.MONTANT_HT, new.MONTANT_TVA, new.MONTANT_TTC);
end //
DELIMITER ;


-- suite � la finalisation d'une commande, transfert des selections vers archive + le panier concern� est d�sactiv�(->false) + nouveau panier (+ supprimer vieux paniers inactif? � voir)
drop trigger if exists AFTER_COMMANDE; 
DELIMITER //
create trigger AFTER_COMMANDE
after insert on COMMANDES
for each row
begin
	call TRANSFERT_SELECTION(new.REF_COM);
	
	update PANIERS
	set ETAT_PANIER = FALSE
	where REF_USER = new.REF_USER;
	
	call NEW_PANIERS(new.REF_USER);
end //
DELIMITER ;


-- mise � jour des stock articles suite � insert archive_selection + suppression des donn�es concern� dans SELECTIONNE
drop trigger if exists AFTER_ARCHIVE;
DELIMITER //
create trigger AFTER_ARCHIVE
after insert on ARCHIVE_SELECTION
for each row
begin
	declare num_panier int(6);
	select REF_PANIER into num_panier from COMMANDES C, ARCHIVE_SELECTION A 
	where C.REF_COM = new.REF_COM
	group by REF_PANIER;
	
	update ARTICLES set QTE_STOCK = QTE_STOCK - new.QTE_CHOISI
	where REF_ART = new.REF_ART;
	
	call SELECTION_DELETE(num_panier);
end //
DELIMITER ;

-- � ajouter (potentiellement) : password non-acceptable + verification des stocks




-- *********************************************************************************



/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Insertion des donn�es
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
REMARQUE : les donn�es �i-dessous sont pour des tests. � modifier plus tard.
Il se peut aussi qu'il y ai des erreurs hors console SQL. � v�rifier.
*/
/*
-- delete from ADMINISTRATEURS;
insert into ADMINISTRATEURS(REF_USER, NOM_USER, PRENOM_USER, EMAIL_USER, MDP_USER) values
	('1', 'Dubois', 'Johnny', 'johnny.dubois@gmail.com', '123456'),
	('2', 'Clappier', 'Denise', 'denise.clappier@gmail.com', '456356'),
	('3', 'Fremont', 'Lucille', 'lucille.fremont@gmail.com', '236458'),
	('4', 'Wang', 'Luc', 'luc.wang@gmail.com', '321654'),
	('5', 'Lambert', 'Tom', 'tom.lambert@gmail.com', '789654');

-- delete from CLIENTS;
insert into CLIENTS(REF_USER, ADRESSE_CLI, CP_CLI, VILLE_CLI, TEL_CLI, NOM_USER, PRENOM_USER, EMAIL_USER, MDP_USER) values
	('C1', "8, rue du matin", 92130, "ISSY-LES-MOULINEAUX", 0153947852, "DEMANY", "Jerome", "jerome.demany@moniris.com", "123");

	
-- delete from MUSIQUES;
insert into MUSIQUES(REF_ART, FORMAT_MUS, ARTISTE, CHANT_MUS, GENRE_MUS, NOM_ART, DESC_ART, ANNEE_ART, PRIX_UNIT, QTE_STOCK) VALUES
	('M1', 'Vinyl', 'John Coltrane', 'John Coltrane', 'Jazz', 'My Favorite Things', "My Favorite Things marque les débuts du nouveau groupe de John Coltrane, et notamment de sa collaboration avec McCoy Tyner et Elvin Jones, qui reste pour de nombreux critiques et amateurs l\'une des meilleures de l\'histoire du jazz.", '1962-10-26', '6.50', 2),
	('M2', 'Cassette', 'Genesis', 'Phil Collins', 'Rock', 'Invisible Touch', 'Invisible Touch est le treizième album studio du groupe britannique Genesis. Cet album, sorti en 1986, est le plus gros succès commercial du groupe.', '1986-05-28', '4.90', 2),
	('M3', 'Vinyl', 'Wu-Tang Clan', 'Ol\' Dirty Bastard', 'Hip_Hop', 'Enter The Wu-Tang', 'Enter the Wu-Tang (36 Chambers) est le premier album studio du Wu-Tang Clan, sorti le 9 novembre 1993, sur le label Loud Records et distribué via RCA Records.', '1997-11-08', '4.90', 3),
	('M4', 'Cassette', 'Aphex Twin', 'Aphex Twin', 'Electronic', 'Selected Ambient Works 85–92', 'Selected Ambient Works 85-92, (souvent abrégé en SAW85-92 ou simplement SAW 1) est le premier album d\'Aphex Twin (pseudonyme du musicien Richard D. James), sorti en 1992.', '1992-03-12', '4.90', 1);
	
-- delete from FILMS;
insert into FILMS(REF_ART, FORMAT_FILM, DUREE_FILM, ARTISTE, NOM_ACTEUR, GENRE_FILM, NOM_ART, DESC_ART, ANNEE_ART, PRIX_UNIT, QTE_STOCK) values
	('F1', 'Long', '01:30:00', 'Andrew Adamson', 'Mike Myers', 'Animation', 'Shrek', 'Shrek est un film d\'animation en images de synthèse américain. Ce film pour enfant est une parodie de contes de fées adaptée du livre illustré de William Steig.', '2001-01-01', '12.49', 3),
	('F2', 'Long', '02:10:50', 'Steven Spielberg', 'Sam Neill', 'Aventure', 'Jurassic Park', 'John Parker Hammond, le PDG de la puissante compagnie InGen, parvient à donner vie à des dinosaures grâce à la génétique et décide de les utiliser dans le cadre d’un parc d\'attractions qu’il compte ouvrir sur une île au large du Costa Rica.', '1997-03-22', '10.50', 2),
	('F3', 'Long', '02:36:00', 'Stanley Kubrick', 'Keir Dullea', 'Science-fiction', '2001, l\'Odyssée de l\'espace', 'En 1999, le Dr Heywood Floyd se rend sur la Lune pour enquêter sur une extraordinaire découverte gardée secrète : les équipes de la base de Clavius ont découvert un monolithe noir de forme parallélépipédique.', '1968-09-28', '9.99', 1),
	('F4', 'Long', '03:01:00', 'Anthony Russo', 'Robert Downey Jr', 'Superheros', 'Avengers: Endgame', 'Le Titan Thanos ayant réussi à s\'approprier les six Pierres d\'Infinité a pu pulvériser la moitié de la population de l\'Univers. Les quelques Avengers et Gardiens de la Galaxie ayant survécu espèrent réparer le méfait de Thanos.', '2019-06-15', '12.69', 4);
	
-- delete from JEUX;
insert into JEUX(REF_ART, PLATFORM_JEU, ARTISTE, GENRE_JEU, NOM_ART, DESC_ART, ANNEE_ART, PRIX_UNIT, QTE_STOCK) VALUES
	('J1', 'PC', 'Blizzard North', 'HacknSlash', 'Diablo', 'Diablo prend place dans un monde de type médiéval-fantastique. L\'histoire se déroule dans un village appelé Tristram dans lequel se trouve un monastère construit pour accueillir la prison d\'un puissant démon connu sous le nom de Diablo.', '1998-04-28', '5.90', 1),
	('J2', 'CD-i', 'Animation Magic', 'Action', 'Link: The Faces of Evil', 'Un jour au château d\'Hyrule, un mystérieux vieillard nommé Gwonam apparaît et prévient le Roi Harkinian que Ganon et ses fidèles se sont emparés de l\'île de Koridaï. Link décide d\'aller combattre Ganon et éliminer ses fidèles.', '1993-10-10', '2.50', 4),
	('J3', 'Xbox One', 'Mojang', 'Sandbox', 'Minecraft', 'Le jeu plonge le joueur dans un monde créé dynamiquement, composé de blocs représentant différents matériaux formant diverses structures des animaux ou monstres. Le joueur peut modifier ce monde à volonté.', '2019-05-10', '4.80', 2),
	('J4', 'Arcade', 'Konami', 'Sports', 'Track & Field', 'Le joueur contrôle un athlète dans six disciplines différentes : le 100 m, le saut en longueur, le lancer de javelot, le 110 m haies, le lancer de marteau et le saut en hauteur.', '1983-01-01', '2.89', 3);
*/


-- *********************************************************************************



/*
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	AUTRE ACTIONS
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Pour tester le bon fonctionnement de la BDD
*/

-- 15 tables actellement
show tables;

-- v�rification des triggers d'h�ritages
SELECT * FROM UTILISATEURS;
SELECT COUNT(REF_ART) FROM ARTICLES;

-- liste des triggers
-- show triggers \G

-- v�rification de la liste des proc�dures
select db, name from mysql.proc;

/*
delete from NEWFILMS;
delete from NEWMUSIQUES;
delete from NEWJEUX;
*/
/*
call NEW_PANIERS('C1');
call NEW_SELECTION('J3', 1, 2);
call NEW_SELECTION('F2', 1, 2);
call FINALISATION_COMMANDE(1);
*/

select * from PANIERS;
select * from SELECTIONNE;
select * from H_SELECTIONNE;
select * from COMMANDES;
select * from ARCHIVE_SELECTION;

select REF_ART, NOM_ART, ARTISTE, ANNEE_ART, PRIX_UNIT, QTE_STOCK from ARTICLES
where REF_ART LIKE "J3" or REF_ART LIKE "F2";

/*
delete from COMMANDES;
delete from SELECTIONNE;
delete from PANIERS;
*/


