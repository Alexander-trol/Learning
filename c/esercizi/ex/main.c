//Si scriva un programma per calcolare ex
//mediante il suo sviluppo in serie:
//Ogni frazione aggiunge precisione al risultato,
//per cui conviene usare valori di n
//adeguatamente elevati, ad esempio compresi
//tra 30 e 40. Si verifichi che i risultati calcolati
//in questo modo siano coerenti con quelli
//forniti dalla funzione intrinseca exp
//calcolando la differenza dei valori.

#include <stdio.h>
#include <math.h>

int main()
{   
    float x, ex;
    int n, fatt, nfatt;

    printf("Inserisci un numero: \n");
    scanf("%f", &x);
    printf("Inserisci il numero delle frazioni: \n");
    scanf("%d", &n);

    nfatt = 1;
    ex = 1;
    for (fatt = 1; fatt < n; fatt++)
    {
        nfatt *= fatt;
        ex += pow(x, fatt) / nfatt;
    }

    printf("Esponenziale: %.20f\n", ex);
    printf("Esponenziale con funzione: %.20f\n", exp(x));
    printf("Differenza: %.20f\n", ex - exp(x));

    return 0;
}