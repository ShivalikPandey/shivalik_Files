// 7.Train Ticket Fare System Input: Age and travel distance.Logic:
//   Children (<5): Free,Senior citizens (>60): 50% discount,Regular: ₹5 
//   per km,Output: Fare amount.
package testing;
import java.util.Scanner;
public class Train_ticket_Fare {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter your age");
		int age=sc.nextInt();
		System.out.println("Enter your distance in km");
		int distance=sc.nextInt();
		double discount;
		double price;
		double netprice;
		if(age<5) {
			System.out.println("You are child so no need of ticket");
		}
		else if(age>60) {
			price=distance*5;
			discount=price*0.5;
			netprice=price-discount;
			System.out.println("Due senior setizen you get 50% discount"
					+ "so netprice for ticket is : "+netprice);
		}
		else {
			netprice=price=distance*5;
			System.out.println("You need to pay : "+netprice);
		}
	}
}
