
import java.awt.Choice;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.SQLException;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class User extends JFrame {
	DB db = new DB("memberInfo.sqlite");
	JTextField idTxt = new JTextField(20);
	JTextField pwdTxt = new JTextField(20);

	public User() {
		setTitle("ȸ������");
		setSize(500, 650);

		JPanel p1 = new JPanel();
		JPanel p2 = new JPanel();
		JPanel p3 = new JPanel();
		JPanel p4 = new JPanel();

		p1.setLayout(new GridLayout(3, 1));
		p2.setLayout(new GridLayout(6, 2));
		p3.setLayout(new GridLayout(7, 2));

		JPanel title1 = new JPanel();
		JPanel idpanel = new JPanel();
		JPanel pwpanel = new JPanel();
		JPanel pwpanel2 = new JPanel();
		JPanel hint1 = new JPanel();
		JPanel hint2 = new JPanel();

		title1.add(new JLabel("���� ȸ�� ���̵� �� ��й�ȣ"));
		p2.add(title1);
		idpanel.add(new JLabel("*���̵�  "));
		idpanel.add(idTxt);
		JButton b1 = new JButton("�ߺ��˻�");
		b1.addActionListener(new actionlistener());
		idpanel.add(b1);
		p2.add(idpanel);
		pwpanel.add(new JLabel("*��й�ȣ  "));
		pwpanel.add(pwdTxt);
		pwpanel.add(new JLabel("(����,�������� 10~15�ڸ�)"));
		p2.add(pwpanel);
		pwpanel2.add(new JLabel("*��й�ȣ Ȯ��  "));
		pwpanel2.add(new JTextField(20));
		p2.add(pwpanel2);
		Choice choice1 = new Choice();
		choice1.add("���� ��￡ ���� ��Ҵ�?");
		hint1.add(new JLabel("*��й�ȣ ��Ʈ ����  "));
		hint1.add(choice1);
		p2.add(hint1);
		hint2.add(new JLabel("*��й�ȣ ��Ʈ �亯  "));
		hint2.add(new JTextField(20));
		p2.add(hint2);

		JPanel title2 = new JPanel();
		JPanel name = new JPanel();
		JPanel usernum = new JPanel();
		JPanel email = new JPanel();
		JPanel number = new JPanel();
		JPanel phonenum = new JPanel();
		JPanel address = new JPanel();

		title2.add(new JLabel("���� ȸ�� �⺻����"));
		p3.add(title2);
		name.add(new JLabel("*����  "));
		name.add(new JTextField(20));
		p3.add(name);
		usernum.add(new JLabel("*�ֹε�Ϲ�ȣ  "));
		usernum.add(new JTextField(10));
		usernum.add(new JLabel("-"));
		usernum.add(new JTextField(10));
		p3.add(usernum);
		email.add(new JLabel("*�̸���  "));
		email.add(new JTextField(15));
		email.add(new JLabel("@"));
		email.add(new JTextField(15));
		Choice choice2 = new Choice();
		choice2.add("����");
		choice2.add("naver.com");
		email.add(choice2);
		p3.add(email);
		number.add(new JLabel("��ȭ��ȣ  "));
		Choice choice3 = new Choice();
		choice3.add("����");
		choice3.add("02");
		number.add(choice3);
		number.add(new JLabel("-"));
		number.add(new JTextField(4));
		number.add(new JLabel("-"));
		number.add(new JTextField(4));
		p3.add(number);
		phonenum.add(new JLabel("*�̵���ȭ  "));
		Choice choice4 = new Choice();
		choice4.add("010");
		phonenum.add(choice4);
		phonenum.add(new JLabel("-"));
		phonenum.add(new JTextField(4));
		phonenum.add(new JLabel("-"));
		phonenum.add(new JTextField(4));
		p3.add(phonenum);

		JPanel send = new JPanel();
		JButton s = new JButton("����");
		s.addActionListener(new actionlistener());
		JButton close = new JButton("���");
		close.addActionListener(new actionlistener());

		send.add(s);
		send.add(close);
		p4.add(send);

		p1.add(p2);
		p1.add(p3);
		p1.add(p4);
		add(p1);
		setVisible(true);

	}

	public void send() throws Exception {

		String name = idTxt.getText();
		String password = pwdTxt.getText();

		db.getStatement().executeUpdate("drop table if exists MEMBER");
		db.getStatement().executeUpdate("create table MEMBER" + "(name TEXT, password TEXT);");
		db.getStatement().executeQuery(
				"insert or IGNORE into MEMBER " + "values (" + "'" + name + "', " + "'" + password + "');");
		db.disconnectDB();
	}

	class actionlistener implements ActionListener {

		@Override
		public void actionPerformed(ActionEvent e) {
			JButton b = (JButton) e.getSource();
			if(b.getText().equals("����")){
				try {
					send();
					JOptionPane.showMessageDialog(null, "���۵�.");
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					JOptionPane.showMessageDialog(null, "���� ����.");
				}
			}
			else if (b.getText().equals("���")) {
				System.exit(0);
			}
		}
	}
}