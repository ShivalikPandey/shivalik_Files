// 10. Loan Eligibility (Multiple Nested Conditions) Input: Age, monthly 
//     income, job type (salaried/self-employed), credit score.Logic:
//     Age> 21,Income ≥ ₹25,000,Salaried: credit score ≥ 650,
//     or Self-employed: credit score ≥ 700,Output: "Eligible" else
//     "Not Eligible"
package testing;
import java.util.Scanner;
public class Loan_Eligibility_checker {
	public class Traffic_light_Simulator {
		public static void main(String[] args) {
			Scanner sc=new Scanner(System.in);
			System.out.println("Enter your age");
			int age=sc.nextInt();
			System.out.println("Enter your salary");
			int salary=sc.nextInt();
		    System.out.println("Enter your credit score");
		    int cscore=sc.nextInt();
		    System.out.println("Enter s(small) for self employed and S(capital) for salaried");
			String employtype=sc.next();
			String tolower=employtype.toLowerCase();
			char converted=tolower.charAt(0);
			if(age>21 && salary>=25000 && converted=='S' && cscore>=650) {
			    System.out.println("You are eligible");
			}
			else if (age>21 && salary>=25000 && converted=='s' && cscore>=700) {
			    System.out.println("You are eligible");
			}
			else {
			    System.out.println("You are not eligible");
			}
		}
	}
}
