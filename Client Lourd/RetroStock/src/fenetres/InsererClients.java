package fenetres;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JTextField;

import requetes.Requete;

import javax.swing.JButton;
import javax.swing.JLabel;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.awt.Color;

public class InsererClients {

	JFrame frame;
	private JTextField textField;
	private JTextField textField_1;
	private JTextField textField_2;
	private JTextField textField_3;
	private JTextField textField_4;
	private JTextField textField_5;
	private JTextField textField_6;
	private JTextField textField_7;
	private JTextField textField_8;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					InsererClients window = new InsererClients();
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
	public InsererClients() {
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(100, 100, 450, 354);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		textField = new JTextField();
		textField.setBounds(43, 36, 96, 19);
		frame.getContentPane().add(textField);
		textField.setColumns(10);
		
		textField_1 = new JTextField();
		textField_1.setBounds(43, 83, 96, 19);
		frame.getContentPane().add(textField_1);
		textField_1.setColumns(10);
		
		textField_2 = new JTextField();
		textField_2.setBounds(43, 130, 96, 19);
		frame.getContentPane().add(textField_2);
		textField_2.setColumns(10);
		
		textField_3 = new JTextField();
		textField_3.setBounds(43, 176, 96, 19);
		frame.getContentPane().add(textField_3);
		textField_3.setColumns(10);
		
		textField_4 = new JTextField();
		textField_4.setBounds(43, 225, 96, 19);
		frame.getContentPane().add(textField_4);
		textField_4.setColumns(10);
		
		textField_5 = new JTextField();
		textField_5.setBounds(249, 36, 96, 19);
		frame.getContentPane().add(textField_5);
		textField_5.setColumns(10);
		
		textField_6 = new JTextField();
		textField_6.setBounds(249, 83, 96, 19);
		frame.getContentPane().add(textField_6);
		textField_6.setColumns(10);
		
		textField_7 = new JTextField();
		textField_7.setBounds(249, 130, 96, 19);
		frame.getContentPane().add(textField_7);
		textField_7.setColumns(10);
		
		textField_8 = new JTextField();
		textField_8.setBounds(249, 176, 96, 19);
		frame.getContentPane().add(textField_8);
		textField_8.setColumns(10);
		
		JLabel lblRfrence = new JLabel("R\u00E9f\u00E9rence");
		lblRfrence.setBounds(43, 13, 96, 13);
		frame.getContentPane().add(lblRfrence);
		
		JLabel lblAdresse = new JLabel("Adresse");
		lblAdresse.setBounds(44, 63, 95, 13);
		frame.getContentPane().add(lblAdresse);
		
		JLabel lblCodePostal = new JLabel("Code Postal");
		lblCodePostal.setBounds(43, 112, 96, 13);
		frame.getContentPane().add(lblCodePostal);
		
		JLabel lblVille = new JLabel("Ville");
		lblVille.setBounds(43, 153, 96, 13);
		frame.getContentPane().add(lblVille);
		
		JLabel lblTlphone = new JLabel("T\u00E9l\u00E9phone");
		lblTlphone.setBounds(43, 205, 96, 13);
		frame.getContentPane().add(lblTlphone);
		
		JLabel lblNom = new JLabel("Nom");
		lblNom.setBounds(249, 13, 96, 13);
		frame.getContentPane().add(lblNom);
		
		JLabel lblPrnom = new JLabel("Pr\u00E9nom");
		lblPrnom.setBounds(249, 65, 96, 13);
		frame.getContentPane().add(lblPrnom);
		
		JLabel lblEmail = new JLabel("Email");
		lblEmail.setBounds(249, 107, 96, 13);
		frame.getContentPane().add(lblEmail);
		
		JLabel lblMotDePasse = new JLabel("Mot de passe");
		lblMotDePasse.setBounds(249, 159, 96, 13);
		frame.getContentPane().add(lblMotDePasse);
		
		JLabel lblVarchar = new JLabel("Varchar");
		lblVarchar.setBounds(149, 39, 46, 13);
		frame.getContentPane().add(lblVarchar);
		
		JLabel lblVarchar_1 = new JLabel("Varchar");
		lblVarchar_1.setBounds(149, 86, 46, 13);
		frame.getContentPane().add(lblVarchar_1);
		
		JLabel lblInt = new JLabel("Int");
		lblInt.setBounds(149, 133, 46, 13);
		frame.getContentPane().add(lblInt);
		
		JLabel lblVarchar_2 = new JLabel("Varchar");
		lblVarchar_2.setBounds(149, 179, 46, 13);
		frame.getContentPane().add(lblVarchar_2);
		
		JLabel lblInt_1 = new JLabel("Int");
		lblInt_1.setBounds(149, 228, 46, 13);
		frame.getContentPane().add(lblInt_1);
		
		JLabel lblVarchar_3 = new JLabel("Varchar");
		lblVarchar_3.setBounds(355, 39, 46, 13);
		frame.getContentPane().add(lblVarchar_3);
		
		JLabel lblVarchar_4 = new JLabel("Varchar");
		lblVarchar_4.setBounds(355, 86, 46, 13);
		frame.getContentPane().add(lblVarchar_4);
		
		JLabel lblVarchar_5 = new JLabel("Varchar");
		lblVarchar_5.setBounds(355, 133, 46, 13);
		frame.getContentPane().add(lblVarchar_5);
		
		JLabel lblVarchar_6 = new JLabel("Varchar");
		lblVarchar_6.setBounds(355, 179, 46, 13);
		frame.getContentPane().add(lblVarchar_6);
		
		JLabel lblEmpty = new JLabel("");
		lblEmpty.setForeground(Color.RED);
		lblEmpty.setBounds(217, 228, 209, 67);
		frame.getContentPane().add(lblEmpty);
		
		JButton btnEnvoyer = new JButton("Envoyer");
		btnEnvoyer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				if(textField.getText().isEmpty() || textField_1.getText().isEmpty() || textField_2.getText().isEmpty() || textField_3.getText().isEmpty() || 
						textField_4.getText().isEmpty() || textField_5.getText().isEmpty() || textField_6.getText().isEmpty() || 
						textField_7.getText().isEmpty() || textField_8.getText().isEmpty()) {

					lblEmpty.setText("Veuillez remplir tous les champs");
				}
				else {
					
					lblEmpty.setText("");
					Requete req = new Requete();
					try {
						req.insererClient(textField.getText(), textField_1.getText(), textField_2.getText(), 
								textField_3.getText(), textField_4.getText(), textField_5.getText(), 
								textField_6.getText(), textField_7.getText(), textField_8.getText());
						frame.setVisible(false);
					} catch (Exception e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}
				}
			}
		});
		btnEnvoyer.setBounds(43, 272, 85, 21);
		frame.getContentPane().add(btnEnvoyer);
	}
}
