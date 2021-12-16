#include <stdio.h>

int main(){

    int anno;
    
    printf("Inserisci l'anno: \n");
    scanf("%d", &anno);
    fflush(stdin);

    if (anno % 400 == 0) //Controllo anno secolare se è bisestile
    {
        printf("L'anno inserito e' bisestile secolarmente");
    }
    else if (anno % 4 == 0)
    {
        printf("L'anno inserito e' bisestile annualmente");
    }
    else if (anno % 400 == 0 && anno % 4 == 0)
    {
        printf("L'anno inserito e' bisestile secolarmente ed annualmente");
    }
}