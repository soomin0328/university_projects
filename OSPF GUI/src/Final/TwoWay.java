package Final;

public class TwoWay implements State {
	String name=this.getClass().getName();
	@Override
	public void someState(StateContext sc) {
		// TODO Auto-generated method stub
		System.out.println("Two Way State");
		sc.changeState(new FullAdjacency());
	}

}
