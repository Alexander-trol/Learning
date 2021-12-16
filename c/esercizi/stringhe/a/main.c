#include <stdio.h>
#include <string.h>
#define DIM 20

int main()
{   
    int i = 0, j = 0;
    char stringa[DIM];

    printf("Scrivi una parola: ");
    gets(stringa);

    for (i = 0; stringa[i] != '\0' && i < 10; i++)
    {
        if(stringa[i] == 'a' || stringa[i] == 'A')
            j++;
    }
    if(j=0)
        printf("La stringa %s non ha nessuna A", stringa);
    else
        printf("La stringa %s ha la A e ha %d caratteri", stringa, j);
    return 0;
}