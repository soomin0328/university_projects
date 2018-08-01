package Final;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.util.ArrayList;
import java.util.Iterator;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class Ospf extends Thread {
	ArrayList<Router> routers;
	ArrayList<Router> tmpRouters;
	Routing routing;
	int time = 0;
	int a = 0;
	boolean init = false;

	public Ospf(ArrayList<Router> routers) {
		this.routers = routers;
		tmpRouters = this.routers;

		start();

		Thread thread = new Thread(() -> {
			while (true)
				try {
					time++;
					if (time % 10 == 0) {
						for (int i = 0; i < tmpRouters.size(); i++) {
							Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
							while (iterator.hasNext()) {
								Router key = (Router) iterator.next();
								key.sc.changeState(new Init());
								sendHello(key);
							}
						}
					}
					System.out.println("=================================================TIME=" + time);
					for (int i = 0; i < tmpRouters.size(); i++) {
						Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
						while (iterator.hasNext()) {
							Router key = (Router) iterator.next();
							if (init == false)
								sendHello(key);
						}
					}
					init = true;
					routing = new Routing(routers.size());

					for (int i = 0; i < tmpRouters.size(); i++) {
						Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
						while (iterator.hasNext()) {
							Router key = (Router) iterator.next();
							routing.input(Integer.parseInt(tmpRouters.get(i).getName()),
									Integer.parseInt(key.getName()), tmpRouters.get(i).getNeighbor().get(key));
						}
					}
					for (int i = 0; i < routers.size(); i++) {
						System.out.print(routers.get(i).getName() + " ");
					}
					System.out.println("---------------------------------------------------");
					for (int i = 0; i < routers.size(); i++) {
						routing.dijkstra(Integer.parseInt(routers.get(i).getName()));
					}

					sleep(1000);
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

		});

		thread.setName(this.getName());
		thread.start();
	}

	class MyPanel extends JPanel {

		@Override
		protected void paintComponent(Graphics g) {
			super.paintComponent(g);

			g.setColor(Color.BLUE);
			g.setFont(new Font("기본", Font.PLAIN, 20));

			int[] x = { 190, 80, 300, 130, 250 };
			int[] y = { 45, 125, 125, 240, 240 };

			if (routers.size() == 1) {
				g.fillOval(160, 15, 60, 60);

				g.setColor(Color.WHITE);
				g.drawString("1", 185, 52);

			} else if (routers.size() == 2) {
				g.fillOval(160, 15, 60, 60);
				g.fillOval(50, 95, 60, 60);

				for (int i = 0; i < tmpRouters.size(); i++) {
					Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
					while (iterator.hasNext()) {
						Router key = (Router) iterator.next();
						if (tmpRouters.get(i).getNeighbor().get(key) != null) {
							g.drawLine(x[i], y[i], x[Integer.parseInt(key.getName()) - 1],
									y[Integer.parseInt(key.getName()) - 1]);
						}
					}
				}

				g.setColor(Color.WHITE);
				g.drawString("1", 185, 52);
				g.drawString("2", 75, 132);

			} else if (tmpRouters.size() == 3) {
				g.fillOval(160, 15, 60, 60);
				g.fillOval(50, 95, 60, 60);
				g.fillOval(270, 95, 60, 60);

				for (int i = 0; i < tmpRouters.size(); i++) {
					Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
					while (iterator.hasNext()) {
						Router key = (Router) iterator.next();
						if (tmpRouters.get(i).getNeighbor().get(key) != null) {
							g.drawLine(x[i], y[i], x[Integer.parseInt(key.getName()) - 1],
									y[Integer.parseInt(key.getName()) - 1]);
						}
					}
				}

				g.setColor(Color.WHITE);
				g.drawString("1", 185, 52);
				g.drawString("2", 75, 132);
				g.drawString("3", 295, 132);

			} else if (routers.size() == 4) {
				g.fillOval(160, 15, 60, 60);
				g.fillOval(50, 95, 60, 60);
				g.fillOval(270, 95, 60, 60);
				g.fillOval(100, 210, 60, 60);

				for (int i = 0; i < tmpRouters.size(); i++) {
					Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
					while (iterator.hasNext()) {
						Router key = (Router) iterator.next();
						if (tmpRouters.get(i).getNeighbor().get(key) != null) {
							g.drawLine(x[i], y[i], x[Integer.parseInt(key.getName()) - 1],
									y[Integer.parseInt(key.getName()) - 1]);
						}
					}
				}

				g.setColor(Color.WHITE);
				g.drawString("1", 185, 52);
				g.drawString("2", 75, 132);
				g.drawString("3", 295, 132);
				g.drawString("4", 125, 247);

			} else if (routers.size() == 5) {
				g.fillOval(160, 15, 60, 60);
				g.fillOval(50, 95, 60, 60);
				g.fillOval(270, 95, 60, 60);
				g.fillOval(100, 210, 60, 60);
				g.fillOval(220, 210, 60, 60);

				for (int i = 0; i < tmpRouters.size(); i++) {
					Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
					while (iterator.hasNext()) {
						Router key = (Router) iterator.next();
						if (tmpRouters.get(i).getNeighbor().get(key) != null) {
							g.drawLine(x[i], y[i], x[Integer.parseInt(key.getName()) - 1],
									y[Integer.parseInt(key.getName()) - 1]);
						}
					}
				}

				g.setColor(Color.WHITE);
				g.drawString("1", 185, 52);
				g.drawString("2", 75, 132);
				g.drawString("3", 295, 132);
				g.drawString("4", 125, 247);
				g.drawString("5", 245, 247);

			}
		}

	}

	public String getNeighbors(int n) {
		String[] str = { "", "", "", "", "" };
		for (int i = 0; i < tmpRouters.size(); i++) {
			Iterator<Router> iterator = tmpRouters.get(i).getNeighbor().keySet().iterator();
			while (iterator.hasNext()) {
				Router key = (Router) iterator.next();
				if (tmpRouters.get(i).getNeighbor().get(key) != null) {
					str[i] += tmpRouters.get(i).getNeighbor().get(key) + ",";
				}
			}
		}
		return str[n];
	}

	public void start() {

		JFrame routerFrame = new JFrame("OSPF 실행");
		routerFrame.setLayout(null);
		routerFrame.setLocation(620, 80);
		routerFrame.setSize(395, 679);

		MyPanel mp = new MyPanel();
		mp.setBounds(0, 0, 379, 326);
		mp.setLayout(null);
		routerFrame.add(mp);

		JPanel p = new JPanel();
		p.setBounds(0, 325, 379, 336);
		p.setLayout(null);
		routerFrame.add(p);

		if (routers.size() == 1) {
			JPanel rp1 = new JPanel();
			rp1.setBounds(0, 0, 379, 65);
			rp1.setLayout(null);
			p.add(rp1);

			JLabel router1 = new JLabel("ROUTER 1");
			router1.setBounds(12, 20, 57, 15);
			rp1.add(router1);

			String a1 = getNeighbors(0);
			JLabel neighbors1 = new JLabel(a1);
			neighbors1.setBounds(98, 10, 269, 45);
			rp1.add(neighbors1);
		} else if (routers.size() == 2) {
			JPanel rp1 = new JPanel();
			rp1.setBounds(0, 0, 379, 65);
			rp1.setLayout(null);
			p.add(rp1);

			JLabel router1 = new JLabel("ROUTER 1");
			router1.setBounds(12, 20, 57, 15);
			rp1.add(router1);

			String a1 = getNeighbors(0);
			JLabel neighbors1 = new JLabel(a1);
			neighbors1.setBounds(98, 10, 269, 45);
			rp1.add(neighbors1);

			JPanel rp2 = new JPanel();
			rp2.setBounds(0, 64, 379, 65);
			rp2.setLayout(null);
			p.add(rp2);

			JLabel router2 = new JLabel("ROUTER 2");
			router2.setBounds(12, 20, 57, 15);
			rp2.add(router2);

			String a2 = getNeighbors(1);
			JLabel neighbors2 = new JLabel(a2);
			neighbors2.setBounds(98, 10, 269, 45);
			rp2.add(neighbors2);
		} else if (routers.size() == 3) {
			JPanel rp1 = new JPanel();
			rp1.setBounds(0, 0, 379, 65);
			rp1.setLayout(null);
			p.add(rp1);

			JLabel router1 = new JLabel("ROUTER 1");
			router1.setBounds(12, 20, 57, 15);
			rp1.add(router1);

			String a1 = getNeighbors(0);
			JLabel neighbors1 = new JLabel(a1);
			neighbors1.setBounds(98, 10, 269, 45);
			rp1.add(neighbors1);

			JPanel rp2 = new JPanel();
			rp2.setBounds(0, 64, 379, 65);
			rp2.setLayout(null);
			p.add(rp2);

			JLabel router2 = new JLabel("ROUTER 2");
			router2.setBounds(12, 20, 57, 15);
			rp2.add(router2);

			String a2 = getNeighbors(1);
			JLabel neighbors2 = new JLabel(a2);
			neighbors2.setBounds(98, 10, 269, 45);
			rp2.add(neighbors2);

			JPanel rp3 = new JPanel();
			rp3.setBounds(0, 127, 379, 65);
			rp3.setLayout(null);
			p.add(rp3);

			JLabel router3 = new JLabel("ROUTER 3");
			router3.setBounds(12, 20, 57, 15);
			rp3.add(router3);

			String a3 = getNeighbors(2);
			JLabel neighbors3 = new JLabel(a3);
			neighbors3.setBounds(98, 10, 269, 45);
			rp3.add(neighbors3);

		} else if (routers.size() == 4) {
			JPanel rp1 = new JPanel();
			rp1.setBounds(0, 0, 379, 65);
			rp1.setLayout(null);
			p.add(rp1);

			JLabel router1 = new JLabel("ROUTER 1");
			router1.setBounds(12, 20, 57, 15);
			rp1.add(router1);

			JLabel neighbors1 = new JLabel("");
			neighbors1.setBounds(98, 10, 269, 45);
			rp1.add(neighbors1);

			JPanel rp2 = new JPanel();
			rp2.setBounds(0, 64, 379, 65);
			rp2.setLayout(null);
			p.add(rp2);

			JLabel router2 = new JLabel("ROUTER 2");
			router2.setBounds(12, 20, 57, 15);
			rp2.add(router2);

			JLabel neighbors2 = new JLabel("");
			neighbors2.setBounds(98, 10, 269, 45);
			rp2.add(neighbors2);

			JPanel rp3 = new JPanel();
			rp3.setBounds(0, 127, 379, 65);
			rp3.setLayout(null);
			p.add(rp3);

			JLabel router3 = new JLabel("ROUTER 3");
			router3.setBounds(12, 20, 57, 15);
			rp3.add(router3);

			JLabel neighbors3 = new JLabel("");
			neighbors3.setBounds(98, 10, 269, 45);
			rp3.add(neighbors3);

			JPanel rp4 = new JPanel();
			rp4.setBounds(0, 190, 379, 65);
			rp4.setLayout(null);
			p.add(rp4);

			JLabel router4 = new JLabel("ROUTER 4");
			router4.setBounds(12, 20, 57, 15);
			rp4.add(router4);

			JLabel neighbors4 = new JLabel("");
			neighbors4.setBounds(98, 10, 269, 45);
			rp4.add(neighbors4);

		} else if (routers.size() == 5) {
			JPanel rp1 = new JPanel();
			rp1.setBounds(0, 0, 379, 65);
			rp1.setLayout(null);
			p.add(rp1);

			JLabel router1 = new JLabel("ROUTER 1");
			router1.setBounds(12, 20, 57, 15);
			rp1.add(router1);

			JLabel neighbors1 = new JLabel("");
			neighbors1.setBounds(98, 10, 269, 45);
			rp1.add(neighbors1);

			JPanel rp2 = new JPanel();
			rp2.setBounds(0, 64, 379, 65);
			rp2.setLayout(null);
			p.add(rp2);

			JLabel router2 = new JLabel("ROUTER 2");
			router2.setBounds(12, 20, 57, 15);
			rp2.add(router2);

			JLabel neighbors2 = new JLabel("");
			neighbors2.setBounds(98, 10, 269, 45);
			rp2.add(neighbors2);

			JPanel rp3 = new JPanel();
			rp3.setBounds(0, 127, 379, 65);
			rp3.setLayout(null);
			p.add(rp3);

			JLabel router3 = new JLabel("ROUTER 3");
			router3.setBounds(12, 20, 57, 15);
			rp3.add(router3);

			JLabel neighbors3 = new JLabel("");
			neighbors3.setBounds(98, 10, 269, 45);
			rp3.add(neighbors3);

			JPanel rp4 = new JPanel();
			rp4.setBounds(0, 190, 379, 65);
			rp4.setLayout(null);
			p.add(rp4);

			JLabel router4 = new JLabel("ROUTER 4");
			router4.setBounds(12, 20, 57, 15);
			rp4.add(router4);

			JLabel neighbors4 = new JLabel("");
			neighbors4.setBounds(98, 10, 269, 45);
			rp4.add(neighbors4);

			JPanel rp5 = new JPanel();
			rp5.setBounds(0, 250, 379, 65);
			rp5.setLayout(null);
			p.add(rp5);

			JLabel router5 = new JLabel("ROUTER 5");
			router5.setBounds(12, 20, 57, 15);
			rp5.add(router5);

			JLabel neighbors5 = new JLabel("");
			neighbors5.setBounds(98, 10, 269, 45);
			rp5.add(neighbors5);

		}

		routerFrame.setVisible(true);

	}

	public void sendHello(Router router) {

		Iterator<Router> iterator = router.getNeighbor().keySet().iterator();
		while (iterator.hasNext()) {
			Router key = (Router) iterator.next();
			key.sc.somestate();
			key.sc.somestate();

		}
	}

}
