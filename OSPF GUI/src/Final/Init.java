package Final;

public class Init implements State {
	@Override
	public void someState(StateContext sc) {
		// TODO Auto-generated method stub
		System.out.println("Init State");
		if(true)//인접이웃의 이웃리스트에 자신이 있다면 투웨이로 체인지
		sc.changeState(new TwoWay());
		
	}

}

