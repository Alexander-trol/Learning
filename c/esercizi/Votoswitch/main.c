#include <stdio.h>

int main(){

    int a;

    printf("Che voto hai preso all'esame: ");
    scanf("%d", &a);
    fflush(stdin);

    switch(a)
    {
    case 18:
        printf("Il tuo voto e' appena sufficiente");
        break;
    case 19:
        printf("Il tuo voto e' basso");
        break;
    case 20:
        printf("Il tuo voto e' basso");
        break;
    case 21:
        printf("Il tuo voto e' medio");
        break;
    case 22:
        printf("Il tuo voto e' medio");
        break;
    case 23:
        printf("Il tuo voto e' medio");
        break;
    case 24:
        printf("Il tuo voto e' buono");
        break;
    case 25:
        printf("Il tuo voto e' buono");
        break;
    case 26:
        printf("Il tuo voto e' buono");
        break;
    case 27:
        printf("Il tuo voto e' alto");
        break;
    case 28:
        printf("Il tuo voto e' alto");
        break;
    case 29:
        printf("Il tuo voto e' alto");
        break;
    case 30:
        printf("Il tuo voto e' massimo");
        break;
    default:
        printf("Il tuo voto e' insufficiente");
        break;
    }
}