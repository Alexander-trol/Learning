#include <stdio.h>

int main(){

    int a, rosso , verde, blu;

    printf("Qual e' il numero della matricola? (da 1 a 6): ");
    scanf("%d", &a);
    fflush(stdin);

    switch(a)
    {
    case 1:
        printf("La matricola numero %d e' nella squadra rossa", a);
        break;
    case 2:
        printf("La matricola numero %d e' nella squadra verde", a);
        break;
    case 3:
        printf("La matricola numero %d e' nella squadra blu", a);
        break;
    case 4:
        printf("La matricola numero %d e' nella squadra rossa", a);
        break;
    case 5:
        printf("La matricola numero %d e' nella squadra verde", a);
        break;
    case 6:
        printf("La matricola numero %d e' nella squadra blu", a);
        break;
    default:
        printf("La matricola numero %d non e' assegnabile", a);
        break;
    }
}