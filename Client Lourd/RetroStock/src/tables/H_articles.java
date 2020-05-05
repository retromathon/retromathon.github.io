package tables;

public class H_articles {
	public H_articles(String h_ref_art, String date_histo, String nom_art, String artiste, String desc_art,
			String annee_art, String prix_unit, String qte_stock) {
		super();
		this.h_ref_art = h_ref_art;
		this.date_histo = date_histo;
		this.nom_art = nom_art;
		this.artiste = artiste;
		this.desc_art = desc_art;
		this.annee_art = annee_art;
		this.prix_unit = prix_unit;
		this.qte_stock = qte_stock;
	}
	private String h_ref_art;
	private String date_histo;
	private String nom_art;
	private String artiste;
	private String desc_art;
	private String annee_art;
	private String prix_unit;
	private String qte_stock;
	
	public String getH_ref_art() {
		return h_ref_art;
	}
	public void setH_ref_art(String h_ref_art) {
		this.h_ref_art = h_ref_art;
	}
	public String getDate_histo() {
		return date_histo;
	}
	public void setDate_histo(String date_histo) {
		this.date_histo = date_histo;
	}
	public String getNom_art() {
		return nom_art;
	}
	public void setNom_art(String nom_art) {
		this.nom_art = nom_art;
	}
	public String getArtiste() {
		return artiste;
	}
	public void setArtiste(String artiste) {
		this.artiste = artiste;
	}
	public String getDesc_art() {
		return desc_art;
	}
	public void setDesc_art(String desc_art) {
		this.desc_art = desc_art;
	}
	public String getAnnee_art() {
		return annee_art;
	}
	public void setAnnee_art(String annee_art) {
		this.annee_art = annee_art;
	}
	public String getPrix_unit() {
		return prix_unit;
	}
	public void setPrix_unit(String prix_unit) {
		this.prix_unit = prix_unit;
	}
	public String getQte_stock() {
		return qte_stock;
	}
	public void setQte_stock(String qte_stock) {
		this.qte_stock = qte_stock;
	}
}
