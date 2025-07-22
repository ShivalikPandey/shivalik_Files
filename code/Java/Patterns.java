/*    
 * Q1-halfpyramid
   1
   1 2 
   1 2 3 
   1 2 3 4
   1 2 3 4 5
  
   Q2-invertedHalfPyramide
   1 2 3 4 5
   1 2 3 4 
   1 2 3 
   1 2 
   1
  
   Q3-fullpyramid
           1
          1 2
         1 2 3
        1 2 3 4
       1 2 3 4 5 
   Q4-fullupperlowerpyramid
       1
      1 2
     1 2 3 
    1 2 3 4
   1 2 3 4 5
    1 2 3 4
     1 2 3
      1 2 
       1
   Q5-hollowhalfpyramid
     1
     1 2
     1   3
     1     4
     1 2 3 4 5
     Q6-
     1 2 3 4 5
     1     4
     1   3
     1 2
     1
     Q7-
          1
         2  2
        3    3
       4      4
      1 2  3 4 5
 */
package testing;
import java.util.*;
class Pattern{
    public void hollowfullpyramid(int size) {
    	    for (int i = 1; i <= size; i++) {
    	        for (int j = i; j < size; j++) {
    	            System.out.print("  ");
    	        }

    	        for (int k = 1; k <= i; k++) {
    	            if (i == size) {
    	                // Print all numbers on last row
    	                System.out.print(k + "   ");
    	            } else if (k == 1 || k == i) {
    	                System.out.print(k + "   ");
    	            } else {
    	                System.out.print("    ");
    	            }
    	        }

    	        System.out.println();
    	    }
    	} 
	public void hollowinvertedhalfpyramid(int size) {
		    for (int i = size; i >= 1; i--) {
		        for (int j = 1; j <= i; j++) {
		            if (i == size || j == 1 || j == i) {
		                System.out.print(j + " ");
		            } else {
		                System.out.print("  "); // 2 spaces for alignment
		            }
		        }
		        System.out.println();
		    }
		}
	public void hollowhalfpyramid(int size) {
		for(int i=1; i<size;i++) {
			for(int j=1;j<=i;j++) {
				if(j==1 || j==i) {
					System.out.print(j+" ");
				}
				else {
					System.out.print("  ");
				}
			}
			
			System.out.println("");
		}
		for(int k=1;k<=size;k++) {
			System.out.print(k+" ");
		}
	}
	public void fullupperlowerpyramid(int size) {
		int x=0;
		for(int i=size; i>0; i--) {
			for(int j=0; j<i;j++) {
				System.out.print(" ");
			}
			x++;
			for(int k=1; k<=x;k++) {
				System.out.print(k+" ");
			}
			System.out.println("");
		}
		int y=size;
		for(int l=0; l<size-1;l++) {
			y--;
			System.out.print(" ");
			for(int m=0;m<=l;m++) {
				System.out.print(" ");
			}
			for(int n=0; n<y ;n++) {
				System.out.print((n+1)+" ");
			}
			System.out.println("");
		}
	}
	public void fullpyramid(int size) {
		int x=0;
		for(int i=size; i>0; i--) {
			for(int j=0; j<i;j++) {
				System.out.print(" ");
			}
			x++;
			for(int k=1; k<=x;k++) {
				System.out.print((k)+" ");
			}
			System.out.println("");
		}
	}
	public void halfpyramid(int size) {
		for(int i=0; i<size; i++) {
			for(int j=0; j<=i; j++) {
				System.out.print((j+1)+" ");
			}
			System.out.println("");
		}
	}
	public void invertedHalfPyramide(int size) {
		for(int i=size; i>0;i--) {
			for(int j=0; j<i;j++) {
				System.out.print((j+1)+" ");
			}
			System.out.println("");
		}
	}
}
public class Patterns {
	public static void main(String[] args) {
		Scanner sc =new Scanner(System.in);
		System.out.println("Enter lines to print");
		int size=sc.nextInt();
		System.out.println("Enter 1 for halfpyramid, 2 for invertedHalfPyramide, "
				+ "3, for fullpyramid 4 for fullupperlowerpyramid,"
				+ "5 for hollowhalfpyramid ,6 for hollowinvertedhalfpyramid"
				+ ",7 for hollowfullpyramid");
		int type=sc.nextInt();
		Pattern patt=new Pattern();
		if(type==1) {
			patt.halfpyramid(size);
		}
		else if(type==2) {
		patt.invertedHalfPyramide(size);
		}
		else if(type==3) {
			patt.fullpyramid(size);
			}
		else if(type==4) {
			patt.fullupperlowerpyramid(size);
			}
		else if(type==5) {
			patt.hollowhalfpyramid(size);
			}
		else if(type==6) {
			patt.hollowinvertedhalfpyramid(size);
			}
		else if(type==7) {
			patt.hollowfullpyramid(size);
			}
		else System.out.println("Wrong input");	
			
		sc.close();
	}
}
