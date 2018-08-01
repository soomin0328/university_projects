package Final;

import java.util.Stack;

public class Routing {
	private int n; // ��� ��
	private float[][] maps; // ����ġ
	Stack<Integer> stack = new Stack<Integer>(); // �Ÿ� ��

	public Routing(int n) {
		this.n = n;
		maps = new float[n + 1][n + 1];

	}

	public void input(int i, int j, float w) {
		maps[i][j] = w;
	}

	public void dijkstra(int v) {
		float distance[] = new float[n + 1]; // �ִ� �Ÿ�
		boolean[] check = new boolean[n + 1]; // �湮�ߴ��� üũ

		for (int i = 1; i < n + 1; i++) {
			distance[i] = Integer.MAX_VALUE;
		}

		distance[v] = 0;
		check[v] = true;
		stack.push(v);

		for (int i = 1; i < n + 1; i++) {// ������ distance����
			if (!check[i] && maps[v][i] != 0) {
				distance[i] = maps[v][i];
			}
		}

		for (int a = 0; a < n - 1; a++) {
			float min = Integer.MAX_VALUE;
			int min_index = -1;

			for (int i = 1; i < n + 1; i++) { // �ּҰ� ã��
				if (!check[i] && distance[i] != Integer.MAX_VALUE) {
					if (distance[i] < min) {
						min = distance[i];
						min_index = i;
					}
				}
			}

			check[min_index] = true;
			stack.push(min_index);
			for (int i = 1; i < n + 1; i++) {
				if (!check[i] && maps[min_index][i] != 0) {
					if (distance[i] > distance[min_index] + maps[min_index][i]) {
						distance[i] = distance[min_index] + maps[min_index][i];
					}
				}
			}

		}

		for (int i = 1; i < n + 1; i++) {
			System.out.print(distance[i] + " ");
		}
		System.out.println("");

		resultDijkstra(distance);
	}

	public float[] resultDijkstra(float[] result) {
		while (!stack.isEmpty()) {
			System.out.print(stack.pop());
		}
		System.out.println();
		return result;

	}
}
