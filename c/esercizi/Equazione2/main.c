#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int main(){
    float a, b, c;
    double x1, x2, d;

    printf("Inserisci i tre coefficienti dell'equazione di secondo grado: \n");
    scanf("%f%f%f", &a, &b, &c);

    if(a==0){
        if((b == 0)&&(c == 0))
            printf("\nequazione indeterminata");
        else if(b==0)
            printf("\nequazione impossibile");
        else {
            printf("l'equazione e' di primo grado\n");
            x1=-c/b;
            printf("\n x= %lf", x1);
	    }
    }
    else{
        d=b*b-4*a*c; 
        printf("\nLa discriminante e' %5.3lf ", d);
        if(d > 0){
            x1=(-b-sqrt(d))/(2*a);
            x2=(-b+sqrt(d))/(2*a);
            printf("\nDue soluzioni reali distinte x1= %5.3f e x2= %5.3f ", x1, x2);
        }
        else if(d == 0){
            x1=(-b)/(2*a); 
            printf("\nDue soluzioni reali coincidenti x1 e x2 uguali a %5.3lf ",x1);
        }
        else printf("\nNon esistono soluzioni reali\n");
        }

    system("pause");
    return 0;
}