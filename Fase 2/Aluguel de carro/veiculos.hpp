#ifndef VEICULO_HPP
#define VEICULO_HPP

#include <iostream>

using namespace std;

class veiculos{
protected:
    string m_modelo;
    string m_placa;
    float m_preco;
    bool m_alugado;

private:
public:
    veiculos() : m_modelo(""), m_placa(""), m_preco(0), m_alugado(false) {};
    veiculos(string modelo, string placa, float preco, bool alugado) : m_modelo(modelo), m_placa(placa), m_preco(preco), m_alugado(alugado) {};
    ~veiculos() {cout << "veiculos destruido"<< endl;};

    string getModelo() const {return m_modelo;};
    string getPlaca() const {return m_placa;};
    float getPreco() const {return m_preco;};
    bool getAlugado() const {return m_alugado;};
    bool setAlugado(bool alugado) {m_alugado=alugado;};

    bool showV(){
        string resp;
        if(m_alugado == false) {
            resp = "nao";
        }else{
            resp = "sim";
        }
        cout << "modelo = " << m_modelo << " / placa = " << m_placa << " / preco = " << m_preco << " / alugado = " << resp << endl;
    }

    };
#endif // VEICULO_HPP
