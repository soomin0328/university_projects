package Final;

public class Init implements State {
	@Override
	public void someState(StateContext sc) {
		// TODO Auto-generated method stub
		System.out.println("Init State");
		if(true)//�����̿��� �̿�����Ʈ�� �ڽ��� �ִٸ� �����̷� ü����
		sc.changeState(new TwoWay());
		
	}

}

