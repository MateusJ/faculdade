#ifndef define hPerson
#define hPerson

#include <iostream>
#include <vector>
#include <fstream>
#include <string>
#include <algorithm>

using namespace std;

struct personPF{
    string nome;
    string nomeMae;
    string cpf;
    string endereco;
    string telefone;
};
struct personPJ{
    string razaoSocial;
    string cnpj;
    string endereco;
    string telefone;
    size_t capitalSocial;
};

bool SaveDatabase(string fileName, const vector<personPF> &listaPF, const vector<personPJ> &listaPJ);
bool loadCadastro(string fileName, vector<personPF> &listaPF, vector<personPJ> &listaPJ);
bool deleteCad(int codPessoa, string p, vector<personPF> &listaPF, vector<personPJ> &listaPJ);
vector<string> ascOrd(vector<personPF> &listaPF, vector<personPJ> &listaPJ);



#endif
