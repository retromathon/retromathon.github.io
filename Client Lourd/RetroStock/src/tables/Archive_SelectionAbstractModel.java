package tables;

import java.util.List;

import javax.swing.table.AbstractTableModel;

public class Archive_SelectionAbstractModel extends AbstractTableModel{

	private List<Archive_Selection> lesArchive_Selection;
	
	
	public Archive_SelectionAbstractModel(List<Archive_Selection> lesArchive_Selection) {
		this.lesArchive_Selection = lesArchive_Selection;
		
	}


	  @Override
	public String getColumnName(int column) {
		  String result = "";
		switch(column){
		case 0:
			result = "ref_com";
		case 1:
			result = "ref_art";
		case 2:
			result = "qte_choisie";
		}
		
		System.out.println(column);
		return result;
	}
	  
	@Override
	public int getRowCount() {
		return lesArchive_Selection.size();
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
			return lesArchive_Selection.get(rowIndex).getRef_com();		
		case 1 :	
			return lesArchive_Selection.get(rowIndex).getRef_art();	
		case 2 :	
			return lesArchive_Selection.get(rowIndex).getQte_choisie();
		default :
			return 0;
		
		}
	}
}