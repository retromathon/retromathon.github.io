package fenetres;

import java.awt.Color;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JTextField;

import requetes.Requete;

import javax.swing.JButton;
import javax.swing.JLabel;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class InsererAdministrateurs {

	JFrame frame;
	private JTextField txtVarchar;
	private JTextField txtVarchar_1;
	private JTextField txtVarchar_2;
	private JTextField txtVarchar_3;
	private JTextField txtVarchar_4;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					InsererAdministrateurs window = new InsererAdministrateurs();
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
	public InsererAdministrateurs() {
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
		
		txtVarchar = new JTextField();
		txtVarchar.setBounds(53, 32, 96, 19);
		frame.getContentPane().add(txtVarchar);
		txtVarchar.setColumns(10);
		
		txtVarchar_1 = new JTextField();
		txtVarchar_1.setBounds(53, 79, 96, 19);
		frame.getContentPane().add(txtVarchar_1);
		txtVarchar_1.setColumns(10);
		
		txtVarchar_2 = new JTextField();
		txtVarchar_2.setBounds(53, 123, 96, 19);
		frame.getContentPane().add(txtVarchar_2);
		txtVarchar_2.setColumns(10);
		
		txtVarchar_3 = new JTextField();
		txtVarchar_3.setBounds(53, 170, 96, 19);
		frame.getContentPane().add(txtVarchar_3);
		txtVarchar_3.setColumns(10);
		
		txtVarchar_4 = new JTextField();
		txtVarchar_4.setBounds(53, 218, 96, 19);
		frame.getContentPane().add(txtVarchar_4);
		txtVarchar_4.setColumns(10);
		
		JLabel lblEmpty = new JLabel("");
		lblEmpty.setBounds(234, 170, 192, 38);
		frame.getContentPane().add(lblEmpty);
		lblEmpty.setForeground(Color.red);
		
		JButton btnEnvoyer = new JButton("Envoyer");
		btnEnvoyer.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {

				if((txtVarchar.getText().isEmpty()) || (txtVarchar_1.getText().isEmpty()) || (txtVarchar_2.getText().isEmpty()) ||
						(txtVarchar_3.getText().isEmpty()) || (txtVarchar_4.getText().isEmpty())) {

					lblEmpty.setText("Veuillez remplir tous les champs");
				}
				else {
					
					lblEmpty.setText("");
					Requete req = new Requete();
					try {
						req.insererAdmin(txtVarchar.getText(), txtVarchar_1.getText(), 
								txtVarchar_2.getText(), txtVarchar_3.getText(), txtVarchar_4.getText());
						frame.setVisible(false);
					} catch (Exception e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}
				}
			}
		});
		btnEnvoyer.setBounds(234, 122, 85, 21);
		frame.getContentPane().add(btnEnvoyer);
		
		JLabel lblAjouterUnAdministrateur = new JLabel("Ajouter un Administrateur");
		lblAjouterUnAdministrateur.setBounds(234, 61, 151, 13);
		frame.getContentPane().add(lblAjouterUnAdministrateur);
		
		JLabel lblPrnom = new JLabel("R\u00E9f\u00E9rence");
		lblPrnom.setBounds(53, 10, 63, 13);
		frame.getContentPane().add(lblPrnom);
		
		JLabel lblNom = new JLabel("Nom");
		lblNom.setBounds(53, 61, 74, 13);
		frame.getContentPane().add(lblNom);
		
		JLabel lblPrnom_1 = new JLabel("Pr\u00E9nom");
		lblPrnom_1.setBounds(53, 104, 74, 13);
		frame.getContentPane().add(lblPrnom_1);
		
		JLabel lblEmail = new JLabel("Email");
		lblEmail.setBounds(53, 147, 46, 13);
		frame.getContentPane().add(lblEmail);
		
		JLabel lblNewLabel = new JLabel("Mot de passe");
		lblNewLabel.setBounds(53, 199, 74, 13);
		frame.getContentPane().add(lblNewLabel);
		
		JLabel lblVarchar = new JLabel("Varchar");
		lblVarchar.setBounds(159, 35, 46, 13);
		frame.getContentPane().add(lblVarchar);
		
		JLabel lblVarchar_1 = new JLabel("Varchar");
		lblVarchar_1.setBounds(159, 82, 46, 13);
		frame.getContentPane().add(lblVarchar_1);
		
		JLabel lblVarchar_2 = new JLabel("Varchar");
		lblVarchar_2.setBounds(159, 126, 46, 13);
		frame.getContentPane().add(lblVarchar_2);
		
		JLabel lblVarchar_3 = new JLabel("Varchar");
		lblVarchar_3.setBounds(159, 173, 46, 13);
		frame.getContentPane().add(lblVarchar_3);
		
		JLabel lblNewLabel_2 = new JLabel("Varchar");
		lblNewLabel_2.setBounds(159, 221, 46, 13);
		frame.getContentPane().add(lblNewLabel_2);
	}
}
