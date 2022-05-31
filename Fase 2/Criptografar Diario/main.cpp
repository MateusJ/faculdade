#include "header.hpp"

int main()
{

    vector < pair<string, int> > senhaDiario;
    vector < pair<unsigned char, unsigned char>> encoder(256);
    pair<string, int> p;
    int opcao;
    string nomeDiario;
    int senha;
    int contador;

    for(size_t i = 0; i < 256; i++){
        encoder.at(i).first = i;
        encoder.at(i).second = i+5;
    }
    bool status = loadSenhas("senhas.txt", senhaDiario);

    while(true){
        contador = 0;
        cout << "Escolha uma opcao: " << endl;
        cout << "1. Criptografar diario" << endl;
        cout << "2. Descriptografar diario: " << endl;
        cout << "3. Ler diario: " << endl;
        cout << "4. Sair: " << endl;
        cin >> opcao;

        if(opcao == 1){
            cout << "Digite o nome do diario a ser criptografado: "<<endl;
            cin >> nomeDiario;

            for(size_t i = 0; i < senhaDiario.size(); i++){
                if(senhaDiario.at(i).first == nomeDiario){
                    contador = 1;
                }
            }
            if(contador == 0){

                cout << "Digite uma senha para a criptografia" << endl;
                cin >> senha;
                p.first = nomeDiario;
                p.second = senha;
                senhaDiario.push_back(p);
            }

            encryptDiarie(nomeDiario, senha, senhaDiario, encoder);

        }else if(opcao == 2){
            cout << "Digite um diario para ser descriptografado" << endl;
            cin >> nomeDiario;
            cout << "Digite a senha para descriptografar o diario" << endl;
            cin >> senha;

            for(size_t i = 0; i < senhaDiario.size(); i++){
                if(senhaDiario.at(i).first == nomeDiario){
                    if(senhaDiario.at(i).second == senha){
                        decryptDiarie(nomeDiario, senhaDiario, encoder);
                    }
                }
            }

        }else if(opcao == 3){
            cout << "Digite o nome de um diario" << endl;
            cin >> nomeDiario;
            lerDiario(nomeDiario);
        }else if(opcao == 4){
            break;
        }
    }
    salvarSenha("senhas.txt", senhaDiario);
}
