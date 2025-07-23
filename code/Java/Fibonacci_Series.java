package testing;
import java.util.*;
public class Fibonacci_Series {
    public static void main(String[] args) {
    	Scanner sc=new Scanner(System.in);
    	System.out.println("Enter upto which term you want to print Fabbonacci_Series" );
        int n = sc.nextInt();
        int first = 0, second = 1;
        System.out.println("Fibonacci Series up to " + n + " terms:");

        for (int i = 1; i <= n; i++) {
            System.out.print(first + " ");
            int next = first + second;
            first = second;
            second = next;
        }
    }
}

