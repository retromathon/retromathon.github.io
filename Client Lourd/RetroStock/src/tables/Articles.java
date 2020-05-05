package tables;

public class Articles {
	
	private String ref_art;
	private String nom_art;
	private String artiste;
	private String desc_art;
	private String annee_art;
	private String prix_unit;
	private String qte_stock;
	
	public Articles(String ref_art, String nom_art, String artiste, String desc_art, String annee_art, String prix_unit, String qte_stock) {
		this.ref_art = ref_art;
		this.nom_art = nom_art;
		this.artiste = artiste;
		this.desc_art = desc_art;
		this.annee_art = annee_art;
		this.prix_unit = prix_unit;
		this.qte_stock = qte_stock;
	}

	public String getRef_art() {
		return ref_art;
	}

	public void setRef_art(String ref_art) {
		this.ref_art = ref_art;
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
