#include <stdio.h>
#define N 10

int main()
{
    int vett[N];
    for (int i=0; i<N; i++)
    {
        printf("Inserisci un numero: \n");
        scanf("%d", &vett[i]);
    }
    for (int i=N-1; i>=0; i--)
        printf("%d\n", vett[i]);
}