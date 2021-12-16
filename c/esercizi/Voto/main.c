#include <stdio.h>

int main(){

    int a;

    printf("Che voto hai preso all'esame: ");
    scanf("%d", &a);
    fflush(stdin);
    if (a >= 18){
        if (a < 30){
            if (a == 18)
                printf("Il tuo voto e' appena sufficiente");
            else if (a >= 19 && a <=20)
                printf("Il tuo voto e' basso");
            else if (a >= 21 && a <=23)
                printf("Il tuo voto e' medio");
            else if (a >= 24 && a <=26)
                printf("Il tuo voto e' buono");
            else if (a >= 27 && a <=29)
                printf("Il tuo voto e' alto");
            else
                printf("Il tuo voto e' massimo");
        }
    }
    else
        printf("Il tuo voto e' insufficiente");
}