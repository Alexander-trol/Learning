//Si scriva un programma dove il calcolatore
//determini casualmente un numero intero
//compreso tra 0 e 99 e chieda all’utente di
//trovare il numero stesso. Ad ogni input
//dell’utente il calcolatore risponde con “troppo
//alto” o “troppo basso”, finché non viene
//trovato il valore corretto. Per generare valori
//casuali si utilizza la funzione rand.

#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(){

    int cas, n;
    srand(time(NULL));
    cas = rand() % 100;

    do
    {
        printf("Indovina il numero tra 0 e 99: \n");
        scanf("%d", &n);
        fflush(stdin);
        if (n > cas)
            printf("Troppo alto\n");
        else if(n < cas)
            printf("Troppo basso\n");
        else
            printf("Hai indovinato!!!");
    } while (n != cas);
}