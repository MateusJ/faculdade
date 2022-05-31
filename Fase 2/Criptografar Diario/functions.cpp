#include "header.hpp"
bool loadSenhas(string fileName, vector< pair<string, int> > &senhaDiario){
    vector<string> nomeSenha;
    int num;
    pair<string, int> p;
    ifstream fileReader(fileName);

    if(!fileReader.is_open()) return false;

    string tmp;

    while(getline(fileReader, tmp)){
        nomeSenha.push_back(tmp);
    }

    for(size_t i = 0; i < nomeSenha.size(); i = i+2){

        p.first = nomeSenha.at(i);
        num = stoi(nomeSenha.at(i+1));
        p.second = num;

        senhaDiario.push_back(p);
    }

}
bool encryptDiarie(string nomeDiario, int senha, vector< pair<string, int> > &senhaDiario, vector< pair<unsigned char, unsigned char> > encoder){
    string texto;
    stringstream textoCrip;
    ifstream filereader(nomeDiario);

    if(!filereader.is_open()){
        cout << "Error, file not found !" << endl;
        return false;
    }

    char ch;
    stringstream sst;
    while(filereader.get(ch)){
        sst << ch;
    }
    texto = sst.str();

    for(size_t i=0; i<texto.size(); i++){

        char ch = texto.at(i);

        for(size_t j=0; j<encoder.size(); j++){
            if(ch == encoder.at(j).first)
            {
                textoCrip << encoder.at(j).second;
            }
        }

    }
    cout << "Texto criptografado com sucesso" << endl;
    ofstream filewriter(nomeDiario);
    if(!filewriter.is_open()) return false;

    filewriter << textoCrip.str();

    filewriter.close();
    return true;
}

bool salvarSenha(string filename, vector< pair<string, int> > &senhaDiario){

    ofstream filewriter(filename);
    if(!filewriter.is_open()) return false;

    for (size_t i = 0; i < senhaDiario.size();i++){
        filewriter << senhaDiario.at(i).first << endl << senhaDiario.at(i).second << endl;
    }
}
bool decryptDiarie(string nomeDiario, vector< pair<string, int> > &senhaDiario, vector < pair<unsigned char, unsigned char> > encoder){
    string texto;
    stringstream textoCrip;
    ifstream filereader(nomeDiario);

    if(!filereader.is_open()){
        cout << "Error, file not found !" << endl;
        return false;
    }

    char ch;
    stringstream sst;
    while(filereader.get(ch)){
        sst << ch;
    }
    texto = sst.str();

    for(size_t i=0; i<texto.size(); i++){

        char ch = texto.at(i);

        for(size_t j=0; j<encoder.size(); j++){
            if(ch == encoder.at(j).second)
            {
                textoCrip << encoder.at(j).first;
            }
        }

    }
    cout << "Texto descriptografado com sucesso" << endl;
    ofstream filewriter(nomeDiario);
    if(!filewriter.is_open()) return false;

    filewriter << textoCrip.str();

    filewriter.close();
    return true;
}
bool lerDiario(string nomeDiario){
    string texto;
    ifstream filereader(nomeDiario);

    if(!filereader.is_open()){
        cout << "Error, file not found !" << endl;
        return false;
    }

    char ch;
    stringstream sst;
    while(filereader.get(ch)){
        sst << ch;
    }
    texto = sst.str();

    cout << texto << endl;
}
