#include <iostream>
using namespace std;

long fibonacci(long);
int main()
{
    int n;
    cout << "Digita un numero naturale: ";
    cin >> n;
    cout << "Il numero di Fibonacci nella posizione " << n << " e' " << fibonacci(n);
}
long fibonacci(long i)
{
    if (i == 0)
        return 0;
    else if (i == 1)
        return 1;
    else
        return fibonacci(i-1) + fibonacci(i-2);
}