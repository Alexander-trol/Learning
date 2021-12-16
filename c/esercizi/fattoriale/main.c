//Si scriva un programma che calcoli il fattoriale
//di un numero intero N dato dalla tastiera. Si
//ricordi che il fattoriale di un numero n (simbolo n!) 
//viene calcolato con la seguente formula:
//n! = n ·(n–1)·(n–2)· ... ·2 ·1

#include <stdio.h>

int main(){
    int n, fatt;

    printf("Inserisci un numero per calcolare: ");
    scanf("%d", &n);
    fflush(stdin);
    
    fatt = n;
    for (int i = 1; i < n; i++)
    {
        fatt = fatt * (n-i);
    }
    printf("Il fattoriale del numero inserito e': %d", fatt);
}