#include <stdio.h>

struct studente{
    char nome [20];
    char cognome [20];
    int eta;
    float mediavoti;
};

typedef int numero;

int main(){

    int n;
    struct studente persona;
    struct studente persona2 = {"Mario", "Rossi", 16, 6.5};

    return 0;
}