package tables;

public class Commandes {

	public Commandes(String ref_com, String ref_panier, String ref_user, String date_com, String montant_ht,
			String montant_tva, String montant_ttc) {
		super();
		this.ref_com = ref_com;
		this.ref_panier = ref_panier;
		this.ref_user = ref_user;
		this.date_com = date_com;
		this.montant_ht = montant_ht;
		this.montant_tva = montant_tva;
		this.montant_ttc = montant_ttc;
	}
	private String ref_com;
	private String ref_panier;
	private String ref_user;
	private String date_com;
	private String montant_ht;
	private String montant_tva;
	private String montant_ttc;
	
	public String getRef_com() {
		return ref_com;
	}
	public void setRef_com(String ref_com) {
		this.ref_com = ref_com;
	}
	public String getRef_panier() {
		return ref_panier;
	}
	public void setRef_panier(String ref_panier) {
		this.ref_panier = ref_panier;
	}
	public String getRef_user() {
		return ref_user;
	}
	public void setRef_user(String ref_user) {
		this.ref_user = ref_user;
	}
	public String getDate_com() {
		return date_com;
	}
	public void setDate_com(String date_com) {
		this.date_com = date_com;
	}
	public String getMontant_ht() {
		return montant_ht;
	}
	public void setMontant_ht(String montant_ht) {
		this.montant_ht = montant_ht;
	}
	public String getMontant_tva() {
		return montant_tva;
	}
	public void setMontant_tva(String montant_tva) {
		this.montant_tva = montant_tva;
	}
	public String getMontant_ttc() {
		return montant_ttc;
	}
	public void setMontant_ttc(String montant_ttc) {
		this.montant_ttc = montant_ttc;
	}
}
