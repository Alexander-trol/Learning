/*
    Scrivere un programma che richieda N numeri
    da tastiera e ne calcoli il valore massimo, il
    valore minimo, la somma e la media.
*/

#include <stdio.h>
#include <stdlib.h>
#include <conio.h>

int main()
{
    int n, max = 0, min = 0, somma = 0, cnt = 0;

    printf("\n\n---CALCOLO VALORE MASSIMO, VALORE MINIMO, SOMMA, MEDIA---\n\n");
    
    do
    {
        printf("Inserisci dei numeri: \n");
        scanf("%d", &n);
        if (n > max){
            max = n;
            min = n;
        }
        if (n < min && n != 0)
            min = n;
        somma = somma + n;
        cnt++;
    } while (n != 0);

    printf("il valore massimo e' %d, il valore minimo e' %d, la somma e' %d e la media e' %d", max, min, somma, somma/cnt);
    

}