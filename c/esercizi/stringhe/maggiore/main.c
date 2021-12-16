#include <stdio.h>
#include <string.h>
#define DIM 50

int main()
{
    char stringa[DIM];
    char stringa1[DIM];

    printf("Scrivi una parola: ");
    gets(stringa);
    printf("Scrivi un'altra parola: ");
    gets(stringa1);

    if(strcmp(stringa, stringa1) >= 0)
        printf("La stringa %s e' piu' grande", stringa);

    else
        printf("La stringa %s e' la piu' grande", stringa1);

    return 0;
}