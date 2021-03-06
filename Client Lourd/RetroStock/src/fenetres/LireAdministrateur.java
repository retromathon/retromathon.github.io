package fenetres;

import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JScrollPane;
import javax.swing.JTable;

import requetes.Requete;
import tables.AdminAbstractModel;
import tables.Administrateurs;

import java.awt.BorderLayout;

public class LireAdministrateur {

	public JFrame frame;
	private JTable table;
	private List<Administrateurs> lesAdmins;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					LireAdministrateur window = new LireAdministrateur();
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
	public LireAdministrateur() {
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
		
		Requete Adminliste = new Requete();
		
		try {
			lesAdmins = Adminliste.lireTousLesAdmins();
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		AdminAbstractModel cliab = new AdminAbstractModel(lesAdmins);
		
		table = new JTable(cliab);
		
		JScrollPane scrollPane = new JScrollPane(table);
		scrollPane.setBounds(24, 10, 402, 165);
		frame.getContentPane().add(scrollPane);
		
		JButton btnNewButton = new JButton("Supprimer Selectionn\u00E9");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				int index = table.getSelectedRow();
				Administrateurs adminex = lesAdmins.get(index);
				
				try {
					Adminliste.supprimerAdmin(adminex);
					lesAdmins.remove(index);
					
					AdminAbstractModel table2 = new AdminAbstractModel(lesAdmins);
					table.setModel(table2);
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
		btnNewButton.setBounds(123, 215, 180, 21);
		frame.getContentPane().add(btnNewButton);
		
		
	}

}
