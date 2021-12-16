//Scrivere un programma che richieda N numeri
//da tastiera e ne calcoli il valore massimo

#include <stdio.h>

int main()
{
    int n, max, cnt;

    for (max = 0, cnt = 0; cnt < 10; cnt++)
    {
        printf("Inserisci 10 numeri: ");
        scanf("%d", &n);
        fflush(stdin);
        if (max < n)
        {
            max = n;
        }
    }
    printf("Il valore massimo dei numeri inseriti e': %d", max);
}