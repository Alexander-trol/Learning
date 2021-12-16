#include <stdio.h>

int main(){
    int a, somma = 0;
    printf("Terminare con EOF\n");
    while (scanf("%d", &a) != EOF)
        somma += a;
        printf("Somma=%d\n", somma);
}