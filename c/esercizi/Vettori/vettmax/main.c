#include <stdio.h>
#include <stdlib.h>
#define N 10

int main()
{
    int i, cnt=0, n, max=0, min, somma=0, vett[N];

    printf("Quanti valori inserirai: \n");
    scanf("%d", &n);
    fflush(stdin);
    if (n >= 0 && n <= N)
    {
        for (i = 0; i < n; i++)
        {
            printf("Inserisci i valori: ");
            scanf("%d", &vett[i]);
            
            cnt++;
        }
        for (i = 0; i < n; i++)
        {
            somma = somma + vett[i];
            if (vett[i] > max)
                max = vett[i]; 
            if (vett[i] < min && vett[i] != 0)
                min = vett[i];
        }
    }
    else
        printf("---ERRORE---");
    
    printf("Il valore massimo e' %d", max);
    printf("Il valore minimo e' %d", min);
    printf("La somma invece e' %d", somma);
    printf("La media invece e' %d", somma/cnt);
}