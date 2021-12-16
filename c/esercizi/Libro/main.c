/*
    Realizzare un programma che permetta di:
    1. Inserire un elenco di massimo 20 libri
    2. Ricercare un libro per titolo
    3. Ricercare un libro per fascia di prezzo pmin<=x<=pmax
    0. Uscita
*/

#include <stdio.h>
#include <conio.h>
#define DIM 20

typedef struct {
    char titolo[DIM];
    char autore[DIM];
    int n_pagine;
    float prezzo
}Libro;

int main(){
    Libro l;
    Libro elenco[DIM];
}
