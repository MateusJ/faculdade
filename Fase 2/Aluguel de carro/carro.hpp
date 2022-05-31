#ifndef CARRO_HPP
#define CARRO_HPP

#include <iostream>
#include "veiculos.hpp"

using namespace std;

class carros : public veiculos{
protected:
    string m_cambio;
private:
public:
    carros() : m_cambio("manual") {};
    carros(string modelo, string placa, float preco, bool alugado, string cambio) : veiculos(modelo, placa, preco, alugado), m_cambio(cambio) {};

    string getCambio() const {return m_cambio;};

     bool showC(){
        string resp;
        if(m_alugado == false) {
            resp = "nao";
        }else{
            resp = "sim";
        }
        cout << "modelo = " << m_modelo << " / placa = " << m_placa << " / preco = " << m_preco << " / alugado = " << resp << " / cambio = "<< m_cambio << endl;
    }
    };
#endif // CARRO_HPP

