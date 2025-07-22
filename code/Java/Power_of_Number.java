// Q4 : wap to calculate the power of  a number
// suppose number= 4   and its power is 2  then output : 16
package testing;
import java.util.*;
public class Power_of_Number {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter number");
		int number=sc.nextInt();
		System.out.println("Enter power");
		int power=sc.nextInt();
		int result=1;
		for(int i=1; i<=power; i++) {
			result=result*number;
		}
		System.out.println(result);
	}
}
