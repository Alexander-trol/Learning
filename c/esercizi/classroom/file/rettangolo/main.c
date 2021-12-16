#include <stdio.h>
#include <stdlib.h>

typedef struct rettangolo
{
    int b;
    int h;
} Rettangolo;

typedef struct nodo
{
    Rettangolo r;
    struct nodo *next;
} Nodo;

void addNodo(Nodo **lista, int base, int altezza);

int main()
{
    Nodo *l = NULL;
    addNodo(&l, 4, 8);
    addNodo(&l, 5, 9);
    addNodo(&l, 6, 10);

    Nodo *tmp;
    tmp = l;
    while (tmp)
    {
        printf("%d %d = %d\n", l->r.b, l->r.h, (l->r.b * l->r.h));
        tmp = tmp->next;
    }
}

void addNodo(Nodo **lista, int base, int altezza)
{
    Nodo *R = (Nodo *)malloc(sizeof(Nodo));
    R->r.b = base;
    R->r.h = altezza;

    R->next = *lista;
    *lista = R;
}