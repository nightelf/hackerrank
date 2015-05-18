#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>

int gcd(int a, int b)
{
  int c;
  while ( a != 0 ) {
     c = a; a = b%a;  b = c;
  }
  return b;
}

int main()
{
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */

    int num_cases, width, height, factor, squares;
    fscanf(stdin, "%d\n", &num_cases);

    for (int i = 0; i < num_cases; i++) {
        fscanf(stdin, "%d %d\n", &width, &height);
        factor = gcd(width, height);
        squares = width * height / (factor * factor);
        printf("%d\n", squares);
    }

    return 0;
}