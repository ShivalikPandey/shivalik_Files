//1. Income Tax Calculator,Input: Annual income.,Logic:Income ≤ 2.5 lakhs → No tax
// 2.5L–5L → 5%,5L–10L → 20%,10L → 30%,Output: Print tax amount.

package testing;
import java.util.Scanner;

public class Income_tax_calcu {

	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		 System.out.println("Enter your salary amount");
		int salary=sc.nextInt();
		double tax=0;
		if(salary<=250000) {
			 tax=0;
			 System.out.println("You should give tax amount : "+tax+" and tax perentageis : 0");
		}
		else if(salary>=250001 && salary<=500000) {
			tax=(float) (salary*0.05);
			 System.out.println("You should give tax amount : "+tax+" and tax perentageis : 5%");
		}
		else if(salary>500001 && salary<=1000000) {
			tax=salary*0.2;
			 System.out.println("You should give tax amount : "+tax+" and tax perentageis : 10%");
		}
		else if(salary>1000001) {
			tax=salary*0.3;
			 System.out.println("You should give tax amount : "+tax+" and tax perentageis : 30%");
		}
		
	}
}



