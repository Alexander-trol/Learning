#include <stdio.h>
void fz(int *);

int main()
{
    int x=2;
    fz(&x);
    printf("%d\n",x);
}

void fz(int *p)
{
*p = 12;
}