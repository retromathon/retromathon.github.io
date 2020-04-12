package fenetres;

import java.awt.EventQueue;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JList;
import javax.swing.JScrollPane;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class Inserer {

	JFrame frame;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Inserer window = new Inserer();
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
	public Inserer() {
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
		
		JLabel lblChoisirUneTable = new JLabel("Choisir une table dans laquelle insérer");
		lblChoisirUneTable.setBounds(104, 22, 220, 13);
		frame.getContentPane().add(lblChoisirUneTable);
		
		String[] listOptions = {
				"Administrateurs",
				"Clients",
				"Films",
				"Jeux",
				"Musiques",
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
			    	InsererAdministrateurs window = new InsererAdministrateurs();
					window.frame.setVisible(true);	
			    }
			    else if(nomTable == "Clients") {
			    	InsererClients window = new InsererClients();
					window.frame.setVisible(true);	
			    }				
			    else if(nomTable == "Films") {
			    	InsererFilms window = new InsererFilms();
					window.frame.setVisible(true);	
			    }				
			    else if(nomTable == "Jeux") {
			    	InsererJeux window = new InsererJeux();
					window.frame.setVisible(true);	
			    }				
			    else if(nomTable == "Musiques") {
			    	InsererMusiques window = new InsererMusiques();
					window.frame.setVisible(true);	
			    }		
			}
		});
		btnOk.setBounds(244, 121, 80, 32);
		frame.getContentPane().add(btnOk);
	}

}
