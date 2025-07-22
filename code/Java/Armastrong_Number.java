//Q1.  Wap to check whether a number is armstrong or not
//     eg. 153 , count digits=3,  1^3+5^3+3^3= 1+125+27=153
/*
package testing;
import java.util.Scanner;
public class Armastrong_Number {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter a number to check for Armstrong number");
		int number=sc.nextInt();
		int count=0;
		int copy=number;
		int lastcopy=number;
		int value=1;
		int result=0;
		int valueresult;
		while(number>0) {
			count++;
			number=number/10;
		}
		while(copy>0) {
			int digit=copy%10;
			copy=copy/10;
			for(int i=1; i<=count;i++) {
				value=value*digit;
			}
			valueresult=value;
			value=1;
			result=result+valueresult;
		}
		if(result==lastcopy) {
			System.out.println("It is an armstrong number");
		}
		else {
			System.out.println("It is not an armstrong number");
		}
	}
}
*/
package testing;
import java.util.Scanner;

public class Armastrong_Number {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        System.out.print("Enter starting number of range: ");
        int start = sc.nextInt();

        System.out.print("Enter ending number of range: ");
        int end = sc.nextInt();

        System.out.println("Armstrong numbers between " + start + " and " + end + " are:");

        for (int number = start; number <= end; number++) {
            int count = 0, temp = number, sum = 0;

            // Step 1: Count digits
            while (temp > 0) {
                temp /= 10;
                count++;
            }

            // Step 2: Copy number again
            temp = number;

            // Step 3: Calculate Armstrong sum
            while (temp > 0) {
                int digit = temp % 10;
                int power = 1;
                for (int i = 0; i < count; i++) {
                    power *= digit;
                }
                sum += power;
                temp /= 10;
            }

            // Step 4: Check if Armstrong
            if (sum == number) {
                System.out.println(number);
            }
        }
    }
}
