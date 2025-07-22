//6. Online Shopping Discount System Input: Total purchase amount and 
//   customer type (New/Returning).Logic:If amount > ₹10,000 and customer
//   is Returning → 20% discount,If amount > ₹10,000 and customer is
//   New → 15% discount,Else if amount > ₹5,000 → 10% discount,
//   Else → No discount Output: Final payable amount.
package testing;
import java.util.Scanner;
public class Shopping_Discount_System {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter total amount");
		int amount=sc.nextInt();
		double payable=amount;
		double discount;
		if(amount>10000) {
			System.out.println("Enter n(for new customer) or r(for returning customer)");
			char customer=sc.next().charAt(0);
			char tolower=Character.toLowerCase(customer);
			if(tolower=='n') {
				discount=amount*0.15;
				payable=amount-discount;
				System.out.println("Your  amount is : "+payable+" after 15% discount");
			}
			else if(tolower=='r') {
				discount=amount*0.2;
				payable=amount-discount;
				System.out.println("Your payable amount is : "+payable+" after 20% discount");
			}
		    else {
		    	System.out.println("You enter wrong input");
		    }
	}
	   else if (amount > 5000) {
           discount = amount * 0.10;
           payable = amount - discount;
           System.out.println("Your amount is: ₹" + payable + " after 10% discount");
       }
	   else {
           System.out.println("No discount applicable.");
           System.out.println("Your payable amount is: ₹" + payable);
       }
	}
}