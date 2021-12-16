#include <stdio.h>
#include <stdlib.h>
#define N 4

int main()
{
    int i, n, a[N], b[N], c[N];

    printf("Quanti valori inserirai: \n");
    scanf("%d", &n);
    fflush(stdin);
    if (n >= 0 && n <= N)
    {
        for (i = 0; i <= N-1; i++)
        {
            printf("Introdurre i valori di A: \n");
            scanf("%d ", &a[i]);
        }
        for (i = 0; i <= N-1; i++)
        {
            printf("Introdurre i valori di B: \n");
            scanf("%d ", &b[i]);
            c[i] = a[i] + b[i];
        }
        for (i = 0; i < N; i++)
        {
            if (c[i] % 2 == 0)
                printf("%d ", c[i]);
        }
        for (i = 0; i < N; i++)
        {
            if (c[i] % 2 == 1)
                printf("%d ", c[i]);
        }
    }
}