package Final;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;
import java.util.Random;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

public class MainFrame extends JFrame implements ActionListener {
	private JTextField routerName, routerAddress;
	private JButton btnAdd, btnDelete, btnStart, btnSearch;

	// 실행했을 때 첫 화면
	public MainFrame() {
		// TODO Auto-generated constructor stub
		setSize(395, 423);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setLocation(620, 130);
		setTitle("OSPF PROTOCOL");
		getContentPane().setLayout(null);

		JPanel panel2 = new JPanel();
		panel2.setBounds(0, 0, 379, 392);
		getContentPane().add(panel2);
		panel2.setLayout(null);

		JLabel label1 = new JLabel("<<라우터 정보 입력(최대 5개)>>");
		label1.setBounds(95, 44, 189, 21);
		panel2.add(label1);

		JLabel label2 = new JLabel("라우터 이름: ");
		label2.setBounds(92, 75, 83, 21);
		panel2.add(label2);

		routerName = new JTextField();
		routerName.setBounds(168, 75, 116, 21);
		panel2.add(routerName);
		routerName.setColumns(10);

		JLabel label3 = new JLabel("라우터 주소: ");
		label3.setBounds(92, 108, 83, 21);
		panel2.add(label3);

		routerAddress = new JTextField();
		routerAddress.setBounds(168, 108, 116, 21);
		panel2.add(routerAddress);
		routerAddress.setColumns(10);

		btnAdd = new JButton("라우터 추가");
		btnAdd.setBounds(131, 193, 117, 23);
		btnAdd.addActionListener(this);
		panel2.add(btnAdd);

		btnDelete = new JButton("라우터 삭제");
		btnDelete.setBounds(131, 226, 117, 23);
		btnDelete.addActionListener(this);
		panel2.add(btnDelete);

		btnSearch = new JButton("라우터 조회");
		btnSearch.addActionListener(this);
		btnSearch.setBounds(131, 259, 117, 23);
		panel2.add(btnSearch);

		btnStart = new JButton("실행");
		btnStart.setBounds(141, 328, 97, 23);
		btnStart.addActionListener(this);
		panel2.add(btnStart);

		setVisible(true);
	}

	ArrayList<Router> routers = new ArrayList<>(); // 라우터 배열리스트

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource().equals(btnAdd)) {// '라우터 추가' 버튼을 눌렀을 때
			if (routerName.getText().equals("") || routerAddress.getText().equals("")) {
				JOptionPane.showMessageDialog(this, "입력칸이 공백입니다.");
			} else {
				if (!routers.isEmpty()) {// 라우터 리스트가 비지 않았을 때

					if (routers.size() == 5) {// AND 라우터 개수가 한계
						JOptionPane.showMessageDialog(this, "더 이상 라우터를 추가 할 수 없습니다.");
						routerName.setText(null);
						routerAddress.setText(null);

					} else {
						if (checkForm() == true) {
							routers.add(new Router(routerName.getText(), routerAddress.getText())); // 추가
							JOptionPane.showMessageDialog(this, routerName.getText() + "라우터 추가성공!");
							routerName.setText(null);
							routerAddress.setText(null);
						}
					
					}
				} else {
					routers.add(new Router(routerName.getText(), routerAddress.getText())); // 추가
					JOptionPane.showMessageDialog(this, routerName.getText() + "라우터 추가성공!");
					routerName.setText(null);
					routerAddress.setText(null);

				}
			}
		} else if (e.getSource().equals(btnDelete)) { // '삭제' 버튼 눌렀을 때
			deleteForm(routerName.getText());
		} else if (e.getSource().equals(btnSearch)) { // '조회'버튼을 눌렀을 때
			// Search search = new Search(name);
			showRouter();
		} else if (e.getSource().equals(btnStart)) { // '실행'버튼을 눌렀을 때
			setconnect(routers);
			Ospf ospf = new Ospf(routers);
		}
	}

	public boolean checkForm() {/* 라우터 이름과 주소 중복 체크 */
		for (int i = 0; i < routers.size(); i++) {
			Router router = routers.get(i);
			if ((router.getName().equals(routerName.getText()))) {/* 이름체크 */
				JOptionPane.showMessageDialog(this, "이미 등록된 이름입니다.");
				return false;
			} else if ((router.getAddress().equals(routerAddress.getText()))) { /* 주소체크 */
				JOptionPane.showMessageDialog(this, "이미 등록된 주소입니다.");
				return false;
			}
		}
		return true;

	}

	public boolean deleteForm(String name) {
		if (routerName.getText().equals("")) {
			JOptionPane.showMessageDialog(this, "입력칸이 공백입니다.");
			return false;
		}
		for (int i = 0; i < routers.size(); i++) {
			if (routers.get(i).getName().equals(name)) {
				routers.remove(i); // 성공
				JOptionPane.showMessageDialog(this, routerName.getText() + "라우터 삭제성공!");
				routerName.setText(null);
				return true;
			}
		}
		JOptionPane.showMessageDialog(this, "라우터 삭제실패!");
		return false;// 실패
	}

	public boolean showRouter() {
		if (routers.isEmpty()) {
			JOptionPane.showMessageDialog(this, "설정된 라우터가 없습니다.");
			return false;// 실패
		} else {
			String colNames[] = { "라우터 이름", "라우터 주소" };
			String rowData[][] = new String[5][2];
			for (int i = 0; i < routers.size(); i++) {
				rowData[i][0] = routers.get(i).getName();
				rowData[i][1] = routers.get(i).getAddress();

			}
			JFrame frame = new JFrame("라우터 조회");
			JTable table = new JTable(rowData, colNames);
			JScrollPane jsp = new JScrollPane(table);
			frame.add(jsp);
			frame.setSize(500, 500);
			frame.setVisible(true);

		}
		return true;
	}

	public void setconnect(ArrayList<Router> router) {
		for (int i = 0; i < router.size(); i++) {
			for (int j = 0; j < router.size(); j++) {
				Random rand = new Random();
				float costNum = (float) (Math.random() * 100) + 1;
				if (rand.nextInt(2) == 1) {
					if (!router.get(j).equals(router.get(i))) {
						router.get(i).getNeighbor().put(router.get(j), costNum);
						router.get(j).getNeighbor().put(router.get(i), costNum);
					}
				}
			}
		}

		for (int i = 0; i < router.size(); i++) {// 인접노드 코스트 출력
			System.out.println(i + 1 + " ------------------------------------------------");
			Iterator<Router> iterator = router.get(i).getNeighbor().keySet().iterator();
			while (iterator.hasNext()) {
				Router key = (Router) iterator.next();
				System.out.print("key=" + key.getName());
				System.out.println(" value=" + router.get(i).getNeighbor().get(key));
			}
		}
	}

	public static void main(String[] args) {
		MainFrame a = new MainFrame();

	}
}

class Router {
	private String name; // 라우터 이름
	private String address; // 라우터 주소
	private Map<Router, Float> neighbor = new HashMap<Router, Float>();// 이웃상대 라우터 // 주소와 // 코스트;
	StateContext sc = new StateContext();

	public Router(String name, String address) {
		this.name = name;
		this.address = address;

	}

	// 하위 getter setter

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getAddress() {
		return address;
	}

	public void setAddress(String address) {
		this.address = address;
	}

	public Map<Router, Float> getNeighbor() {
		return neighbor;
	}

	public void setNeighbor(Map<Router, Float> neighbor) {
		this.neighbor = neighbor;
	}

}