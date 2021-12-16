#include <stdio.h>
#include <stdlib.h>
#define R 2
#define C 2

int main()
{
    int i, j, n1, n2, max, min, v, somma = 0, mx[R][C];

    printf("Quante righe e colonne vuoi inserire: ");
    scanf("%d%d", &n1, &n2);
    fflush(stdin);

    if (n1 >= 0 && n2 >=0 && n1 <= R && n2 <= C)
    {
        for (i = 0; i < R; i++){
            for (j = 0; j < C; j++){
                printf("Inserisci due valori per riempire la matrice: ");
                scanf("%d", &mx[i][j]);
            }
        }
        max = mx[0][0];
        min = mx[0][0];
        for (i = 0; i < R; i++){
            for (j = 0; j < C; j++){
                v=mx[i][j];
                somma += v;
                if (v > max)
                    max = v;
                else if(v < min)
                    min = v;
            }
        }
        printf("Il valore massimo e' %d, il valore minimo e' %d, la somma e' %d e la media e' %d", max, min, somma, somma/(R*C));
    }
    else
        printf("---ERRORE---");
}