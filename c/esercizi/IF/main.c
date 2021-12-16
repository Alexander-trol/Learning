#include <stdio.h>

int main(){

    int a, b, c, max;

    printf("Inserisci tre numeri: \n");
    scanf("%d%d%d", &a, &b, &c);
    fflush(stdin);

    if (a > b && a > c){
        max = a;
        printf("%d e' il numero piu' grande", a);
    }
    else if (b > a && b > c){
        max = b;
        printf("%d e' il numero piu' grande", b);
    }
    else{
        max = c;
        printf("%d e' il numero piu' grande", c);
    }
    
        
}