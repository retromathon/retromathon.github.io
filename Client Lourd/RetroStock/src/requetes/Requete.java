package requetes;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

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
}