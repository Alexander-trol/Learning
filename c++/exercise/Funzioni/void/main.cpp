#include <iostream>
using namespace std;

void ciao(string, int);

int main()
{
    string nome;
    int eta;
    
    cout << "Inserisci il tuo nome: " << endl;
    getline(cin, nome);
    cout << "Inserisci la tua eta': " << endl;
    cin >> eta;
    ciao(nome, eta);
}
void ciao(string n, int e)
{
    cout << "Il tuo nome e'" << n << " e la tua eta' e' " << e;
}