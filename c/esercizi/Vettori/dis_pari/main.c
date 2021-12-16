#include <stdio.h>
#define N 10

int main()
{
    int i, n, vett[N];

    printf("Quanti valori inserirai: \n");
    scanf("%d", &n);
    fflush(stdin);

    if (n >= 0 && n <= N)
    {
        for (i = 0; i < n; i++)
        {
            printf("Inserisci un valore: \n");
            scanf("%d", &vett[i]);
        }
        for (i = 0; i < n; i++)
        {
            if (vett[i] % 2 == 0)
                printf("%d ", vett[i]);
        }
        for (i = n; i > 0; i--)
        {
            if (vett[i] % 2 == 1)
                printf("%d ", vett[i]);
        }
    }
    else
        printf("---ERRORE---");
    
}