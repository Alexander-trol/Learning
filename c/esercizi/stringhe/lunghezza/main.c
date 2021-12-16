#include <stdio.h>
#include <string.h>
#define DIM 20

int main()
{
    char stringa[DIM];

    printf("Qual e' il tuo nome: ");
    gets(stringa);
    printf("La stringa %s ha %d caratteri", stringa, strlen(stringa));

    return 0;
}
