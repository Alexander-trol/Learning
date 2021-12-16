#include <stdio.h>
#include <string.h>
#define DIM 20

int main()
{
    char stringa[DIM];
    char stringa1[DIM];

    printf("Scrivi una parola: ");
    gets(stringa);
    printf("Scrivi un'altra parola: ");
    gets(stringa1);

    if(strlen(stringa) >= strlen(stringa1))
        printf("La stringa %s e' piu' lunga", stringa);

    else
        printf("La stringa %s e' piu' lunga", stringa1);

    return 0;
}