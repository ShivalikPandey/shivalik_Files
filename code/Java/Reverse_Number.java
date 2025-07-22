// Q2 : wap to reverse a number like if n=1234 then m=4321.
package testing;
import java.util.Scanner;
public class Reverse_Number {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter your number");
		String number=sc.next();
		System.out.print("The reversed number is : ");
		for(int i=(number.length()-1); i>=0; i--) {
			char reverse=number.charAt(i);
			System.out.print(reverse);
		}
	}
}
