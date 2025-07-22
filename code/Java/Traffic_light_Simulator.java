//9. Traffic Light Simulation Input: Color as a string (red, yellow, 
//   green).Logic:Red → "Stop",Yellow → "Wait",Green → "Go",Invalid → 
//   "Invalid color"

package testing;
import java.util.Scanner;
public class Traffic_light_Simulator {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter red,yellow or green for traffic light control");
		String color=sc.next();
		String converted=color.toLowerCase();
		System.out.println(converted);
		if(color.equals("red")){
			System.out.println("Stop");
		}
		else if(color.equals("yellow")) {
			System.out.println("Wait");
		}
		else if(color.equals("green")) {
			System.out.println("Go");
		}
		else {
			System.out.println("You enter invalid color");
		}
}
}