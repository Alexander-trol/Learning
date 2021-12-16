#include <iostream>
using namespace std;

int nMax(int, int);

int main()
{
    int n, n1;
    cout << "Inserisci due numeri: " << endl;
    cin >> n >> n1;
    cout << "Il numero piu' grande e': " << nMax(n, n1);
}

int nMax(int num, int num1)
{
    if (num > num1)
        return num;
    else
        return num1;
}