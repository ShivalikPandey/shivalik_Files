// Q1 : wap to check whether a number is prime or not

package testing;
import java.util.Scanner;
public class Prime_number_checker {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter number");
		int number=sc.nextInt();
		int i=1;
		int count=0;
		boolean prime=false;
		while(i<=number) {
			if(number%i==0) {
				count++;
              }
		       i++;
	       }
		if(count==2) {
			System.out.println("it is a prime number");
		}
		else {
			System.out.println("it is not a prime number");
		}
      }
}
