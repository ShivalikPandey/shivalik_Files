
/* 
  *  *  *  *  * 
   *  *  *  * 
    *  *  * 
     *  * 
      * 
  */
package testing;
import java.util.*;
public class Star_Pattern_1{
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter lines to print star");
		int lines=sc.nextInt();
		for(int i=0; i<lines;i++) {
			for(int k=0; k<=i;k++) {
				System.out.print(" ");
			}
			for(int j=0; j<lines-i;j++) {
				System.out.print(" * ");
			}
			System.out.println("");
		}
	}
}
