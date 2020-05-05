package tables;

public class Archive_Selection {
	
	private String ref_com;
	private String ref_art;
	private String qte_choisie;
	
	public Archive_Selection(String ref_com, String ref_art, String qte_choisie) {
		this.ref_com = ref_com;
		this.ref_art = ref_art;
		this.qte_choisie = qte_choisie;
	}

	public String getRef_com() {
		return ref_com;
	}

	public void setRef_com(String ref_com) {
		this.ref_com = ref_com;
	}

	public String getRef_art() {
		return ref_art;
	}

	public void setRef_art(String ref_art) {
		this.ref_art = ref_art;
	}

	public String getQte_choisie() {
		return qte_choisie;
	}

	public void setQte_choisie(String qte_choisie) {
		this.qte_choisie = qte_choisie;
	}
}
