import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

class LoginGUI extends JFrame {
	public LoginGUI (){
		setTitle("�α���");
		setSize(300,200);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		JPanel p1 = new JPanel();
		JPanel p2 = new JPanel();
		p2.setLayout(new GridLayout(3, 1));
		JPanel p3 = new JPanel();
		JPanel p4 = new JPanel();
		JPanel p5 = new JPanel();
		JLabel id = new JLabel("���̵� ");
		JLabel pw = new JLabel("��й�ȣ ");
		JTextField idtf = new JTextField(10);
		JPasswordField pwtf = new JPasswordField(10);
		JButton b1 = new JButton("�α���");
		JButton b2 = new JButton("ȸ������");
		b1.addActionListener(new loginactionListener());
		b2.addActionListener(new loginactionListener());
		
		p3.add(id);
		p3.add(idtf);
		p2.add(p3);
		p4.add(pw);
		p4.add(pwtf);
		p2.add(p4);
		p5.add(b1);
		p5.add(b2);
		p2.add(p5);
		p1.add(p2);
		add(p1);
		
		setVisible(true);
	}
	
	class loginactionListener implements ActionListener {

		@Override
		public void actionPerformed(ActionEvent e) {
			// TODO Auto-generated method stub
			JButton button = (JButton) e.getSource();
			if(button.getText().equals("�α���")){
				JOptionPane.showMessageDialog(null, "�α��� ����");
				System.exit(0);
			}else if(button.getText().equals("ȸ������")){
				User u = new User();
			}
		}
		
	}
}

public class Login{
	public static void main(String[] args) {
		LoginGUI l = new LoginGUI();
	}
}
class MemberInfo {

	   public static void main(String[] args) throws Exception {
	      // TODO Auto-generated method stub
	     
	   }

	}