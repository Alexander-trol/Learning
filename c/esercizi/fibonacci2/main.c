#include <stdio.h>

int main()
{
    int a = 1, b = 1, c, cnt;

    printf("Inserisci quanti numeri di fibonacci da vedere: \n");
    scanf("%d", &cnt);
    fflush(stdin);
    printf("%d %d ", a, b);

    for (int i = 0; i < cnt; i++)
    {
        c = a+b;
        if (c <= cnt)
        {
            printf("%d ", c);
            a = b;
            b = c;
        }
    }
    return 0;
}