
/*
      *
     * *
    * * * 
   * * * * 
 */
package testing;
import java.util.*;
public class Star_Patter_2 {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		System.out.println("Enter lines to print star");
		int lines=sc.nextInt();
		for(int i=0;i<lines;i++) {
			for(int j=lines-1;j>=i;j--) {
				System.out.print(" ");
			}
			for(int k=0; k<=i;k++) {
				System.out.print(" * ");
			}
			System.out.println("");
		}
	}

}
