import java.io.*;
import java.util.*;

public class Solution {

    public static void main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution. */
        int pairs, numDraws, numCases;
        Scanner in = new Scanner(System.in);

        numCases = in.nextInt();
        for (int i = 0; i < numCases; i++) {
            pairs = in.nextInt();
            numDraws = pairs > 0 ? pairs + 1 : 0;
            System.out.println(numDraws);
        }
    }
}