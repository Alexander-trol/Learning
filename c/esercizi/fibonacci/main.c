//Scrivere un programma che calcola i primi N
//numeri di Fibonacci, con N introdotto dalla
//tastiera. I numeri di Fibonacci sono una
//sequenza di valori interi che inizia con i due
//valori fissi 1 e 1 e ogni successivo valore è la
//somma dei due precedenti.
//Ad esempio i primi 10 numeri di Fibonacci
//sono: 1 1 2 3 5 8 13 21 34 55.

#include <stdio.h>

int main()
{
    int a = 1, b = 1, c, cnt;

    printf("Inserisci quanti numeri di fibonacci da vedere: \n");
    scanf("%d", &cnt);
    fflush(stdin);
    printf("%d %d ", a, b);

    for (int i = 0; i < cnt; i++)
    {
        c = a+b;
        printf("%d ", c);
        a = b;
        b = c;
    }
    return 0;
}