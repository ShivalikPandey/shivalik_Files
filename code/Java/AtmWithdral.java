// 3. ATM Withdrawal LogicInput: Balance and withdrawal amount.Conditions
//    :Withdrawal amount must be a multiple of 100.Balance must be 
//    sufficient (including ₹5 service charge).Output: Updated balance 
//    or error message.
package testing;
import java.util.Scanner;
public class AtmWithdral {
	public static void main(String[] arg) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter your balance amount");
		int balance=sc.nextInt();
		System.out.println("Enter withdrawl amount in mutiple of 100");
		int wamount=sc.nextInt();
		boolean multiplecheck=wamount%100==0?true:false;
		if(balance>=wamount) {
			if(multiplecheck==true) {
				balance=balance-(wamount+5);
				System.out.println("Your withdrawl is proccessed and updated balance after 5 rupees service chatge is : "+balance);
				System.out.println("Thank you for use please visit again");
			}
			else {
				System.out.println("You are not enter amount of multiple of "
						+ "100 retry with correct amount");
			}
		}
		else {
			System.out.println("Tou have not sufficient balance");
		}
	}
}
