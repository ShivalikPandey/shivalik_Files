// 4. Password Strength Checker Input: A string (password).Logic:Must 
//    have ≥ 8 characters Must contain uppercase, lowercase, digit, and 
//    special character,Output: "Strong", "Moderate", or "Weak"
package testing;
import java.util.Scanner;
public class Password_Strength_Checker {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter your password for set up but must have "
				+ "uppercase, lowercase, digit, have ≥ 8 characters "
				+ ", special character");
		String pass=sc.next();
		int length=pass.length();
		int lower=0;
		int upper=0;
		int number=0;
		int special=0;
		for(int i=0; i<pass.length();i++) {
			char character=pass.charAt(i);
			boolean checklower=Character.isLowerCase(character);
			if(Character.isLowerCase(character)==true) {
				lower++;
			}
			boolean checkupper=Character.isUpperCase(character);
			if(checkupper==true) {
				upper++;
			}
			boolean checknumber=Character.isDigit(character);
			if(checknumber==true) {
				number++;
			}
			boolean checkspecial = (character == '@' || character == '#' || character == '$' || 
                    character == '!' || character == '%' || character == '^' || character == '*');

                    if (checkspecial) {
                           special++;
}		
		}
		if(length>=8 && lower>=1 && upper>=1 && special>=1) {
			System.out.println("Your password is setting which is : "+pass);
		}
		else {
			System.out.println("Please enter password correctly as tell above because it is weak : "+pass);
		}
	}

}
