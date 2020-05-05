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
import tables.Archive_SelectionAbstractModel;
import tables.Archive_Selection;

import java.awt.BorderLayout;

public class LireArchive_Selection {

	public JFrame frame;
	private JTable table;
	private List<Archive_Selection> lesArchiveSel;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					LireArchive_Selection window = new LireArchive_Selection();
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
	public LireArchive_Selection() {
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
		
		Requete Archive_Selliste = new Requete();
		
		try {
			lesArchiveSel = Archive_Selliste.lireTousLesArchive_Selection();
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		Archive_SelectionAbstractModel cliab = new Archive_SelectionAbstractModel(lesArchiveSel);
		
		table = new JTable(cliab);
		
		JScrollPane scrollPane = new JScrollPane(table);
		scrollPane.setBounds(24, 10, 402, 165);
		frame.getContentPane().add(scrollPane);
		
		JButton btnNewButton = new JButton("Supprimer Selectionn\u00E9");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				int index = table.getSelectedRow();
				Archive_Selection archisel = lesArchiveSel.get(index);
				
				try {
					Archive_Selliste.supprimerArchive_Selection(archisel);
					lesArchiveSel.remove(index);
					
					Archive_SelectionAbstractModel table2 = new Archive_SelectionAbstractModel(lesArchiveSel);
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
