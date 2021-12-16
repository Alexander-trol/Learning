#include <stdio.h>
#include <time.h>
#include <stdlib.h>
#define R 4
#define C 4

int main()
{
    int n1, n2, i, j, p = 0, d = 0, unquarto, mx[R][C];

    printf("Quante righe e colonne vuoi inserire: ");
    scanf("%d%d", &n1, &n2);
    fflush(stdin);
    srand(time(NULL));

    if (n1 >= 0 && n2 >=0 && n1 <= R && n2 <= C)
    {
        for (i = 0; i < n1; i++){
            for (j = 0; j < n2; j++){
                mx[i][j] = rand() % 100;
            }
        }
        for (i = 0; i < n1; i++){
            for (j = 0; j < n2; j++){
                printf("%d ", mx[i][j]);
            }
        }
        unquarto = n1*n2/4;
        for (i = 0; i < n1; i++){
            for (j = 0; j < n2; j++){
                if (mx[i][j] % 2 == 0){
                    p++;
                    if(p >= unquarto)
                        goto stop;
                }
                else
                    d++;
            }
        }
        stop:
        if(p > unquarto)
            printf("Almeno un quarto dei valori e' pari\n");
        else
            printf("Meno di un quarto dei valori e' pari");
    }
    else
        printf("---ERRORE---");
}