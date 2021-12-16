//Scrivere un programma che calcoli la media
//(con parte frazionaria) di 10 valori interi
//introdotti dalla tastiera.

#include <stdio.h>
#include <stdlib.h>

int main(){

    int n, somma = 0, cnt = 0;
    float med;

    do
    {
        printf("Inserisci 10 valori: \n");
        scanf("%d", &n);
        fflush(stdin);

        somma += n;
        cnt++;
    } while (cnt < 10);

    med = somma / cnt;
    printf("La media dei numeri inseriti e': %5.2lf", med);
}