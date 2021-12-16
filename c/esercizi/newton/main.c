#include <stdio.h>

int main()
{
    double a, x, xp;

    printf("Numero? ");
    scanf("%lf", &a);

    if (a == 0)
        printf("%f\n", 0.0);
    else if (a < 0)
        printf("Valore immaginario\n");
    else
    {
        x = a; /* xp e' il valore precedente di x */
        do
        {
            xp = x;                 /* salva la x di prima in xp */
            x = .5 * (xp + a / xp); /* nuova approssimazione x */
        }while (x < xp);           /* continua finche' x varia */
        printf("%.20f\n", x);
    }

    return 0;
}