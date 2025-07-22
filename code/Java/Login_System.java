// 8. Login Authentication System Input: Username and password.Logic:If 
//    both match → "Login successful",If username correct but password 
//    wrong → "Incorrect password",Else → "Invalid username"
package testing;
import java.util.Scanner;
public class Login_System {
	public class Password_Strength_Checker {
		public static void main(String[] args) {
			Scanner sc=new Scanner(System.in);
			System.out.println("Enter your password");
			String pass=sc.next();
			System.out.println("Enter your Id");
			String id=sc.next();
			String savedid="Shivalik";
		    String savedpass="Pandey@123";
		    boolean checkid=id.contains(savedid)?true:false;
		    boolean checkpass=pass.contains(savedpass)?true:false;
		    String result=checkid==true?checkpass==true?"you are successfully Login":
		    	"You entered incorrect password":"You entered wrong Id";
			System.out.println(result);
		}
		}
}
