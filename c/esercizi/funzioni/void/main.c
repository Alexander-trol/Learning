#include <stdio.h>

void stampa_errore(int linea)
{
    fprintf(stderr, "Errore: linea %d", linea);
}

int main()
{
    int linea_err = 14;
    stampa_errore(linea_err);
}