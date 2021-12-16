#include <iostream>
using namespace std;

double cubo(int);

int main()
{
    int n;
    cout << "Inserisci un numero: " << endl;
    cin >> n;
    cout << "Il Valore del tuo cubo e': " << cubo(n) << endl;
}

double cubo(int num)
{
    return num*num*num;
}