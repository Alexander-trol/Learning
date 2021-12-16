#include <stdio.h>
#include <stdlib.h>
#define N 10
int main()
{
    int n, i, val, cnt = 1, cnt2 = 1, vett[N];

    printf("Quanti valori vuoi inserire: ");
    scanf("%d", &n);
    fflush(stdin);

    if (n >= 0 && n <= N)
    {
        for (i = 0; i < n; i++)
        {
            printf("Inserisci i valori: ");
            scanf("%d", &vett[i]);
        }
        for (i = 0; i < n; i++)
        {
            if (vett[i] == vett[i-1])
            {
                cnt++;
                if (cnt > cnt2);
                {
                    cnt2 = cnt;
                    val = vett[i];
                }
            }
            else
            cnt = 1;
        }
        printf("Il valore %d viene ripetuto %d volte", val, cnt2);
    }
    else
        printf("---ERRORE---");
}