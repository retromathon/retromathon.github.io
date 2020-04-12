package fenetres;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import requetes.Requete;
import javax.swing.JLabel;

public class Applimain {

	private JFrame frame;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Applimain window = new Applimain();
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
	public Applimain() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 450, 300);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		
		JButton btnInserer = new JButton("Insertion");
		btnInserer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				Inserer window = new Inserer();
				window.frame.setVisible(true);
			}
		});
		btnInserer.setBounds(59, 162, 85, 21);
		frame.getContentPane().add(btnInserer);
		
		JButton btnLire = new JButton("Lire");
		btnLire.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				Lire window = new Lire();
				window.frame.setVisible(true);
			}
		});
		
		btnLire.setBounds(279, 162, 85, 21);
		frame.getContentPane().add(btnLire);
		
		JLabel lblBienvenueSurRetrostock = new JLabel("Bienvenue sur RetroStock");
		lblBienvenueSurRetrostock.setBounds(134, 20, 160, 28);
		frame.getContentPane().add(lblBienvenueSurRetrostock);
		
		JLabel lblFaireUneInsertion = new JLabel("Faire une Insertion");
		lblFaireUneInsertion.setBounds(59, 132, 113, 13);
		frame.getContentPane().add(lblFaireUneInsertion);
		
		JLabel lblLireUneTable = new JLabel("Lire une Table");
		lblLireUneTable.setBounds(279, 132, 85, 13);
		frame.getContentPane().add(lblLireUneTable);
	}
}
