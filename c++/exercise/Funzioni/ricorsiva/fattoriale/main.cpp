#include <iostream>
using namespace std;

long fattoriale(long);
int main()
{
    int n;
    cout << "Digita un numero naturale: " << endl;
    cin >> n;
    cout << "Il fattoriale del numero " << n << " e': " << fattoriale(n);
}

long fattoriale(long n)
{
    if(n == 0)
        return 1;
    else
        return n*fattoriale(n-1);
}