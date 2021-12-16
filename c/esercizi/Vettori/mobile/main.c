#include <stdio.h>
#include <stdlib.h>
#define N 11

int main()
{
    float cnt=0, n, somma=0, vett[N];
    int i, j;
    printf("Quanti valori inserirai: \n");
    scanf("%f", &n);
    fflush(stdin);
    if (n >= 0 && n <= N)
    {
        for (i = 0; i < n; i++)
        {
            printf("Introdurre i valori di A: \n");
            scanf("%f", &vett[i]);
        }
        for (i = 0; i < n-2; i++)
        {
            printf("%f ", (vett[i] + vett[i+1] + vett[i+2])/3);
        }
    }
}