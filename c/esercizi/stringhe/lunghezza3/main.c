#include <stdio.h>
#include <string.h>
#define DIM 50

int main()
{   
    int i;
    char stringa[DIM];

    printf("Scrivi una parola: ");
    gets(stringa);

    for (i = 0; stringa[i] != '\0'; i++);
    printf("La stringa %s ha %d caratteri", stringa, i);

    return 0;
}