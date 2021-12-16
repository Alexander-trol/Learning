#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define DD 10

int main (){
    int max;
    int min;
    int vet[DD];
    int i=0;
    srand(time(NULL));

    for(i=0; i<DD; i++){
        vet[i] = rand()%100+1;
        printf("\n%d\t",vet[i]);
    }

    i = 0;
    min = vet[i];
    max = vet[i];

    for(i=0; i<DD; i++){
        if(vet[i] > max){
            max = vet[i];
        }
        if(vet[i] < min){
            min = vet[i];
        }
    }

    printf("\nmax = %d; min = %d", max, min);


}