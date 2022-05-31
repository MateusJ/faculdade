#ifndef MOTO_HPP
#define MOTO_HPP

#include <iostream>
#include "veiculos.hpp"

using namespace std;

class motos : public veiculos{
protected:
    string m_partida;
private:
public:
    motos() : m_partida("eletrica") {};
    motos(string modelo, string placa, float preco, bool alugado, string partida) : veiculos(modelo, placa, preco, alugado), m_partida(partida) {};

    string getPartida() const {return m_partida;};

     bool showM(){
        string resp;
        if(m_alugado == false) {
            resp = "nao";
        }else{
            resp = "sim";
        }
        cout << "modelo = " << m_modelo << " / placa = " << m_placa << " / preco = " << m_preco << " / alugado = " << resp << " / partida = "<< m_partida << endl;
    }
    };
#endif // MOTO_HPP

