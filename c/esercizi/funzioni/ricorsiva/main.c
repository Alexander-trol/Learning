#include <stdio.h>
#include <stdlib.h>
#include <conio.h>

int divisori (int x, int y, int div)
{	
	int cnt = 1;
	if(x>y)
		return 1;
	if(x%cnt==0)
		return divisori(x, y, div++);
	cnt++;
	x++;
/*
    for (c=x; c<=y; c++)
    {
        for (cnt=1; cnt<=c; cnt++)
        {
            if (c%cnt==0)
                div++;
        }
*/
}

int main ()
{
    int est1, est2, nDivisori=0;
    printf("Inserire l'estremo inferiore: ");
    scanf("%d", &est1);
    printf("Inserire l'estremo superiore: ");
    scanf("%d", &est2);

    nDivisori = divisori(est1, est2, nDivisori);
    
    if (nDivisori==1 || nDivisori==2)
        printf("Il numero %d e' primo\n", est1);
    else
        printf("Il numero di divisori di %d e': %d\n", est1, nDivisori);
}

