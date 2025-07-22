// 5. Student Result System Input: Marks in 5 subjects.Logic:If any 
//    subject has < 35 marks → Fail,Average ≥ 90 → Grade A,75–89 → GradeB
//    ,60–74 → Grade C,Below 60 → Grade D,Output: Grade or Fail
package testing;
import java.util.Scanner;
public class Student_Result_system {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter your password");
		int result=sc.nextInt();
		if(result>=35 && result<60) {
			System.out.println("You have got Grade D");
		}
		else if(result>=60 && result<75) {
			System.out.println("You have got Grade C");
		}
		else if(result>=75 && result<90) {
			System.out.println("You have got Grade B");
		}
		else if(result>=90) {
			System.out.println("You have got Grade A");
		}
		else {
			System.out.println("Sorry you are fail");
		}
	}
}
