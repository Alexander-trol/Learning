#include <iostream>
using namespace std;

int main()
{
    string frase = "Giraffa volante";
    cout << endl << "Ciao ";
    cout << frase << endl;
    cout << "La frase e' lunga " << frase.length() << " caratteri" << endl;
    cout << "Il primo carattere e' " << frase[0] << endl;
    cout << "La parola volante comincia al punto: " << frase.find("volante", 0) << endl;
    cout << "Dall'ottavo carattere tolgo 3 caratteri e la frase diventa: " << frase.substr(8, 3) << endl;

        //Concatenazione
    string nome1 = "Alessandro", nome2 = "Popa";
    string nome3 = nome1 + " " + nome2;
    cout << nome3 << endl;

    string nome4 = "Angelica ", nome5 = "Luppi";
    string nome6 = nome4.append(nome5);
    cout << nome6 << endl;

}