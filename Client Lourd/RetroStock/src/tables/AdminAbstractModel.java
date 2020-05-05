package tables;

import java.util.List;

import javax.swing.table.AbstractTableModel;

public class AdminAbstractModel extends AbstractTableModel{

	private List<Administrateurs> lesAdmins;
	
	
	public AdminAbstractModel(List<Administrateurs> lesAdmins) {
		this.lesAdmins = lesAdmins;
		
	}


	  @Override
	public String getColumnName(int column) {
		  String result = "";
		switch(column){
		case 0:
			result = "ref";
		case 1:
			result = "nom";
		case 2:
			result = "prenom";
		case 3:
			result = "email";
		case 4:
			result = "mdp";
		}
		
		System.out.println(column);
		return result;
	}
	  
	@Override
	public int getRowCount() {
		return lesAdmins.size();
	}

	@Override
	public int getColumnCount() {
		return 5;
	}

	@Override
	public Object getValueAt(int rowIndex, int columnIndex) {
		switch(columnIndex)
		{
		case 0: 
			return lesAdmins.get(rowIndex).getRef();		
		case 1 :	
			return lesAdmins.get(rowIndex).getNom();	
		case 2 :	
			return lesAdmins.get(rowIndex).getPrenom();	
		case 3 :	
			return lesAdmins.get(rowIndex).getEmail();	
		case 4 :	
			return lesAdmins.get(rowIndex).getMdp();	
		default :
			return 0;
		
		}
	}
}