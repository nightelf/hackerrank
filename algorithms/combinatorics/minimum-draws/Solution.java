import java.io.*;
import java.util.*;

public class Solution {

    public static void main(String[] args) {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT. Your class should be named Solution. */
        int pairs, numDraws, numCases;
        BufferedReader bufferedReader;
        String line;
        Scanner in;

        bufferedReader = new BufferedReader(new InputStreamReader(System.in));

        try {
            line = bufferedReader.readLine();
            in = new Scanner(line);
            numCases = in.nextInt();
        } catch(IOException e) {
            e.printStackTrace();
            return;
        }
        for (int i = 0; i < numCases; i++) {
            try {
                line = bufferedReader.readLine();
            } catch(IOException e) {
                e.printStackTrace();
                continue;
            }
            
            in = new Scanner(line);
            pairs = in.nextInt();
            numDraws = pairs > 0 ? pairs + 1 : 0;
            System.out.println(numDraws);
        }
    }
}