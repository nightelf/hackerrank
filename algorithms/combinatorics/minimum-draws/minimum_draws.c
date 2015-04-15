#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>

int main() {

    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    int pairs, num_draws, num_cases;
    fscanf(stdin, "%d\n", &num_cases);
    for (int i=0; i < num_cases; i++) {
        fscanf(stdin, "%d\n", &pairs);
        num_draws =  pairs > 0 ? pairs + 1 : 0;
        printf("%d\n", num_draws);
    }
    return 0;
}
