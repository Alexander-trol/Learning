/*Scrivere un programma che calcoli la media di tutti i valori introdotti dalla tastiera finché non
ne viene introdotto uno non compreso tra 18 e 30, ad esempio 9999 (provare proprio
questo valore!). La visualizzazione della media deve avvenire solo alla fine (ossia non ogni
volta che un valore viene introdotto).
*/
#include <stdio.h>
#include <stdlib.h>

int main()
{
    int a, med, somma = 0, cnt = 0;

    do
    {
        printf("Inserisci il tuo voto per calcolarne la media: \n");
        scanf("%d", &a);
        fflush(stdin);
        if (a >= 18 && a <= 30)
        {
            somma = somma + a;
            cnt++;
        }
    } while (a >= 18 && a <= 30);
    
    med = somma / cnt;
    printf("La media dei tuoi voti e' %d", med);
    
}