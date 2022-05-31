#include "person.hpp"

int main(){

vector<personPF> listaPF;
vector<personPJ> listaPJ;
int escolha;
personPF p1;
personPJ p2;


bool status = loadCadastro("Database.dat", listaPF, listaPJ);
while(true){



    //cout << "MY PAPA'S COMPANY - SIG" << endl << "1. Add PF..." << endl << "2. Add PJ..." << endl << "3. Remove PF by Index..." << endl << "4. Remove PJ by Index..." << endl << "5. Print Names in Ascending Order" << endl << "6. Exit" << endl << endl << "Option:" << endl ;
    cin >> escolha;

    if(escolha == 1){

        //cout << "Nome: " << endl;
        cin.ignore();
        getline(cin, p1.nome);
        //cout << "Nome da Mae: " << endl;
        getline(cin, p1.nomeMae);
        //cout << "CPF: " << endl;
        cin >> p1.cpf;
        //cout << "endereco: " << endl;
        cin.ignore();
        getline(cin, p1.endereco);
        //cout << "telefone: " << endl;
        getline(cin, p1.telefone);

        listaPF.push_back(p1);



    }else if(escolha == 2){


        //cout << "Razao social: " << endl;
        cin.ignore();
        getline(cin, p2.razaoSocial);
       //cout << "CNPJ: " << endl;
        cin >> p2.cnpj;
        //cout << "Endereco: " << endl;
        cin.ignore();
        getline(cin, p2.endereco);
        //cout << "Telefone: " << endl;
        getline(cin, p2.telefone);
        //cout << "Capital Social: " << endl;
        cin >> p2.capitalSocial;

        listaPJ.push_back(p2);




    }else if(escolha == 3){

        int codPessoa;
        string p = "PF";
        //cout << "Enter with a position to remove: " << endl;
        cin >> codPessoa;

        deleteCad(codPessoa, p, listaPF, listaPJ);

    }else if(escolha == 4){
        int codPessoa;
        string p = "PJ";
        //cout << "Enter with a position to remove: " << endl;
        cin >> codPessoa;

        deleteCad(codPessoa, p, listaPF, listaPJ);
    }else if(escolha == 5){

        cout << "Names in Ascending Order: "<< endl;
        vector<string>sortNames = ascOrd(listaPF,listaPJ);

        for(size_t i = 0; i<sortNames.size();i++){
            cout<<sortNames.at(i)<<endl;
        }

    }else if(escolha == 6){
        break;
    }

}
SaveDatabase("Database.dat", listaPF, listaPJ);
return 0;
}
