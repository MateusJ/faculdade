#ifndef define header
#define header

#include <iostream>
#include <vector>
#include <fstream>
#include <string>
#include <algorithm>
#include <sstream>

using namespace std;

bool loadSenhas(string fileName, vector< pair<string, int> > &senhaDiario);
bool encryptDiarie(string nomeDiario, int senha, vector< pair<string, int> > &senhaDiario, vector < pair<unsigned char, unsigned char> > encoder);
bool salvarSenha(string filename, vector< pair<string, int> > &senhaDiario);
bool decryptDiarie(string nomeDiario, vector< pair<string, int> > &senhaDiario, vector < pair<unsigned char, unsigned char> > encoder);
bool lerDiario(string nomeDiario);


#endif
