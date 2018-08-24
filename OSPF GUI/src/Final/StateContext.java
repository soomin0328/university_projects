package Final;

public class StateContext {
	private State currentState;
	public StateContext(){
		currentState= new Init();

		
	}
	public void changeState(State newState){
		this.currentState=newState;

	}
	public void somestate(){
		this.currentState.someState(this);
	}
}
