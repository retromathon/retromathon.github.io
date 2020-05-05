package requetes;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

import tables.Administrateurs;
import tables.Archive_Selection;

public class Requete {

	public void insererAdmin(String ref, String nom, String prenom, String mail, String mdp) throws Exception {
		String sql = "INSERT INTO Administrateurs values (?, ?, ?, ?, ?)";
		Connection connexion = null;
		PreparedStatement preparedStatement = null;
		try {
			connexion = Connexion.CreerConnexion();

			preparedStatement = connexion.prepareStatement(sql);

			preparedStatement.setString(1, ref);
			preparedStatement.setString(2, nom);
			preparedStatement.setString(3, prenom);
			preparedStatement.setString(4, mail);
			preparedStatement.setString(5, mdp);

			preparedStatement.executeUpdate();

		} catch (Exception e) {
			throw e;
		} finally {
			if (preparedStatement != null)
				preparedStatement.close();
			if (connexion != null)
				connexion.close();
		}
	}
	
	public void insererClient(String ref, String adresse, String cp, String ville, String tel,
			String nom, String prenom, String mail, String mdp) throws Exception {
		String sql = "INSERT INTO Clients values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		Connection connexion = null;
		PreparedStatement preparedStatement = null;
		try {
			String com = "0";
			connexion = Connexion.CreerConnexion();

			preparedStatement = connexion.prepareStatement(sql);

			preparedStatement.setString(1, ref);
			preparedStatement.setString(2, adresse);
			preparedStatement.setString(3, cp);
			preparedStatement.setString(4, ville);
			preparedStatement.setString(5, tel);
			preparedStatement.setString(6, nom);
			preparedStatement.setString(7, prenom);
			preparedStatement.setString(8, com);
			preparedStatement.setString(9, mail);
			preparedStatement.setString(10, mdp);

			preparedStatement.executeUpdate();

		} catch (Exception e) {
			throw e;
		} finally {
			if (preparedStatement != null)
				preparedStatement.close();
			if (connexion != null)
				connexion.close();
		}
	}
	
	////// LIRE //////
	
public List<Administrateurs> lireTousLesAdmins() throws Exception {
		
		List<Administrateurs> lesAdmins = new ArrayList<Administrateurs>();
		String sql = "SELECT * from administrateurs;";
		Connection connexion = null;
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		
	
		
		try {
			connexion = Connexion.CreerConnexion();

			preparedStatement = connexion.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
			
			
			while (resultSet.next()) {
				  { String ref = resultSet.getString("REF_USER"); 
				  String nom = resultSet.getString("NOM_USER");
				  String prenom = resultSet.getString("PRENOM_USER");
				  String email = resultSet.getString("EMAIL_USER");
				  String mdp = resultSet.getString("MDP_USER");
				  
				  Administrateurs admin = new Administrateurs(ref, nom, prenom, email, mdp);
				  lesAdmins.add(admin);
				  
				  } 
			}

			

		} catch (Exception e) {
			throw e;
		} finally {
			if (preparedStatement != null)
				preparedStatement.close();
			if (connexion != null)
				connexion.close();
		}
		
		
		return lesAdmins;
	}



public List<Archive_Selection> lireTousLesArchive_Selection() throws Exception {
		
		List<Archive_Selection> lesArchisel = new ArrayList<Archive_Selection>();
		String sql = "SELECT * from archive_selection;";
		Connection connexion = null;
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		
	
		
		try {
			connexion = Connexion.CreerConnexion();

			preparedStatement = connexion.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
			
			
			while (resultSet.next()) {
				  { String ref_com = resultSet.getString("REF_COM"); 
				  String ref_art = resultSet.getString("REF_ART");
				  String qte_choisie = resultSet.getString("QTE_CHOISI");
				  
				  Archive_Selection archisel = new Archive_Selection(ref_com, ref_art, qte_choisie);
				  lesArchisel.add(archisel);
				  
				  } 
			}

			

		} catch (Exception e) {
			throw e;
		} finally {
			if (preparedStatement != null)
				preparedStatement.close();
			if (connexion != null)
				connexion.close();
		}
		
		
		return lesArchisel;
	}

	////// SUPPRIMER //////

public void supprimerAdmin(Administrateurs admin) throws Exception {
	String sql = "DELETE from Administrateurs where ref_user = ?";
	Connection connexion = null;
	PreparedStatement preparedStatement = null;
	try {
		connexion = Connexion.CreerConnexion();

		preparedStatement = connexion.prepareStatement(sql);

		preparedStatement.setString(1, admin.getRef());

		preparedStatement.executeUpdate();

	} catch (Exception e) {
		throw e;
	} finally {
		if (preparedStatement != null)
			preparedStatement.close();
		if (connexion != null)
			connexion.close();
	}
}

public void supprimerArchive_Selection(Archive_Selection archisel) throws Exception {
	String sql = "DELETE from Archive_Selection where ref_com = ?";
	Connection connexion = null;
	PreparedStatement preparedStatement = null;
	try {
		connexion = Connexion.CreerConnexion();

		preparedStatement = connexion.prepareStatement(sql);

		preparedStatement.setString(1, archisel.getRef_com());

		preparedStatement.executeUpdate();

	} catch (Exception e) {
		throw e;
	} finally {
		if (preparedStatement != null)
			preparedStatement.close();
		if (connexion != null)
			connexion.close();
	}
}


}