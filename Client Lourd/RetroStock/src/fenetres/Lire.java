package fenetres;

import java.awt.EventQueue;
import java.util.ArrayList;
import java.util.List;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JList;
import javax.swing.JScrollPane;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class Lire {

	JFrame frame;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Lire window = new Lire();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public Lire() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 450, 300);
		frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		JLabel lblChoisirUneTable = new JLabel("Choisir une table à lire");
		lblChoisirUneTable.setBounds(104, 22, 220, 13);
		frame.getContentPane().add(lblChoisirUneTable);
		
		String[] listOptions = {
				"Administrateurs",
				"Archive_Selection",
				"Articles", 
				"Clients",
				"Commandes",
				"Films",
				"Jeux",
				"Musiques",
				"h_articles",
				"h_commandes",
				"h_selectionne",
				"Paniers",
				"Propose",
				"Selectionne",
				"Utilisateurs"};
		
		JList list = new JList(listOptions);
		list.setBounds(0, 0, 1, 1);
		
		JScrollPane scrollPane = new JScrollPane(list);
		scrollPane.setBounds(71, 57, 155, 184);
		frame.getContentPane().add(scrollPane);
		
		JButton btnOk = new JButton("Ok");
		
		btnOk.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				int index = list.getSelectedIndex();
				String nomTable = listOptions[index];

			    if(nomTable == "Administrateurs") {
			    	LireAdministrateur window = new LireAdministrateur();
					window.frame.setVisible(true);	
			    }	

			    if(nomTable == "Archive_Selection") {
			    	LireArchive_Selection window = new LireArchive_Selection();
					window.frame.setVisible(true);	
			    }	
			}
		});
		btnOk.setBounds(268, 122, 85, 33);
		frame.getContentPane().add(btnOk);
		

	}
}
