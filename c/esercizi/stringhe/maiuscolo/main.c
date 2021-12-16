#include <stdio.h>
#include <string.h>
#include <ctype.h>
#define DIM 20

int main()
{
    char s[DIM];
    int i;

    printf("Inserisci una  parola: ");
    gets(s);

    for (i=0; s[i]!='\0'; i++)
        s[i] = (char)toupper(s[i]);
    puts(s);
}