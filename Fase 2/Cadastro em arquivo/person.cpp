#include "person.hpp"

bool SaveDatabase(string fileName, const vector<personPF> &listaPF, const vector<personPJ> &listaPJ){

    ofstream filewriter(fileName);

    if(!filewriter.is_open()) return false;

    for(size_t i = 0; i < listaPF.size(); i++){
        filewriter << "1" << endl << listaPF.at(i).nome << endl << listaPF.at(i).nomeMae << endl << listaPF.at(i).cpf << endl << listaPF.at(i).endereco << endl << listaPF.at(i).telefone << endl;
    }

    for(size_t i = 0; i < listaPJ.size(); i++){
        filewriter << "2" << endl << listaPJ.at(i).razaoSocial << endl << listaPJ.at(i).cnpj << endl << listaPJ.at(i).endereco << endl << listaPJ.at(i).telefone << endl << listaPJ.at(i).capitalSocial << endl;
    }


    filewriter.close();

    return true;
}
bool loadCadastro(string fileName, vector<personPF> &listaPF, vector<personPJ> &listaPJ){

    vector<string> cadastro;
    personPF p3;
    personPJ p4;
    int num;

    ifstream fileReader(fileName);

    if(!fileReader.is_open()) return false;

    string tmp;

    while(getline(fileReader, tmp)){
        cadastro.push_back(tmp);
    }
    for(size_t i = 0; i<cadastro.size(); i = i+6){

        if (cadastro.at(i) == "1"){
            p3.nome = cadastro.at(i+1);
            p3.nomeMae = cadastro.at(i+2);
            p3.cpf = cadastro.at(i+3);
            p3.endereco = cadastro.at(i+4);
            p3.telefone = cadastro.at(i+5);
            listaPF.push_back(p3);

        }else if(cadastro.at(i) == "2"){
            p4.razaoSocial = cadastro.at(i+1);
            p4.cnpj = cadastro.at(i+2);
            p4.endereco = cadastro.at(i+3);
            p4.telefone = cadastro.at(i+4);
            num = stoi(cadastro.at(i+5));
            p4.capitalSocial = num;
            listaPJ.push_back(p4);
        }

    }

    return true;
}
bool deleteCad(int codPessoa, string p, vector<personPF> &listaPF, vector<personPJ> &listaPJ){
    if(p == "PF"){
        if(codPessoa <= listaPF.size()){
            listaPF.erase (listaPF.begin()+codPessoa);
        }else {
            //cout << "Error, invalid index." << endl;
        }
    }
    if(p == "PJ"){
        if(codPessoa <= listaPJ.size()){
            listaPJ.erase (listaPJ.begin()+codPessoa);
        }else{
            //cout << "Error, invalid index." << endl;
        }
    }
}
vector<string> ascOrd(vector<personPF> &listaPF, vector<personPJ> &listaPJ){
    vector<string> nameSort;
    for (size_t i = 0; i < listaPF.size();i++){
        nameSort.push_back(listaPF.at(i).nome);
    }
    for (size_t i = 0; i < listaPJ.size();i++){
        nameSort.push_back(listaPJ.at(i).razaoSocial);
    }
    sort(nameSort.begin(), nameSort.end());

   return nameSort;
}

