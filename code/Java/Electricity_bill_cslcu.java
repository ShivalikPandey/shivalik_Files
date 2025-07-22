
//  Q2- Electricity Bill Calculator,Input: Units consumed.Slabs:First 100 units: ₹1.50/unit, 
//  101–300 units: ₹2.00/unit,Above 300 units: ₹3.00/unit,Add ₹50 fixed charge if usage > 200 
//  units.,Output: Total bill amount.
package testing;
import java.util.Scanner;

public class Electricity_bill_cslcu {

	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		 System.out.println("Enter your electricity units");
			int unit=sc.nextInt();
			double amount=0;
			double fixed=50;
			if(unit<=100) {
				amount=unit*1.50;
				 System.out.println("You need to pay amount : "+amount+"according to 1.50/unit");
			}
			else if(unit>100 && unit<=300) {
				if(unit>200) {
					amount=unit*2+fixed;
					 System.out.println("You need to pay amount : "+amount+"according to 2/unit + 50 fixed about above 200 units");
				}
				else {
					amount=unit*2;
					 System.out.println("You need to pay amount : "+amount+"according to 2/unit");
				}
			}
			else {
				amount=unit*3+fixed;
				 System.out.println("You need to pay amount : "+amount+"according to 3/unit + 50 fixed about above 200 units");
			}
	}
}
