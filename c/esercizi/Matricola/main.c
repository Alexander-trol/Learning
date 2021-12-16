#include <stdio.h>

int main(){

    int a, rosso , verde, blu;

    printf("Qual e' il numero della matricola? (da 1 a 6): ");
    scanf("%d", &a);
    fflush(stdin);
    if (a > 0 && a < 7){
        if (a == 1 || a == 4)
            printf("La matricola numero %d e' nella squadra rossa", a);
        else if (a == 2 || a == 5)
            printf("La matricola numero %d e' nella squadra verde", a);
        else
            printf("La matricola numero %d e' nella squadra blu", a);
    }
    else
        printf("La matricola numero %d non e' assegnabile", a);
}