package requetes;

import java.sql.Connection;
import java.sql.DriverManager;

public class Connexion {
	public static Connection CreerConnexion()
	{
	String JdbcURL = "jdbc:mysql://localhost:3306/retromathon?useSSL=false&serverTimezone=UTC";
    String Username = "root";
    String password = "";
    Connection con = null;
  try {
		
	
       System.out.println("Connexion √  la base..............."+JdbcURL);
       con=DriverManager.getConnection(JdbcURL, Username, password);
       System.out.println("Connexion r√©ussie");
  }
  catch (Exception e) {
	  e.printStackTrace();
}
  return con;
  }
	

}
