#ifndef CLIENTE_HPP
#define CLIENTE_HPP

#include <iostream>
#include "veiculos.hpp"
#include "carro.hpp"
#include "moto.hpp"

using namespace std;

class cliente{
protected:
    size_t m_id;
    string m_name;
    carros *m_carro;
    motos *m_moto;


private:
public:
    cliente() : m_id(0), m_name(""), m_carro(NULL), m_moto(NULL) {};
    cliente(size_t id, string name, carros *m_carro, motos *m_moto) : m_id(id), m_name(name), m_carro(m_carro), m_moto(m_moto) {};
    ~cliente() {cout << "cliente destruido"<< endl;};

    size_t getId() const {return m_id;};
    string getName() const {return m_name;};
    string getCarroNome() const {return m_carro->getModelo();};
    string getMotoNome() const {return m_moto->getModelo();};

    bool alugarCarro(carros *carro){
        if(carro->getAlugado() == true){
            cout << "este carro ja está alugado" << endl;
            return false;
        }
        carro->setAlugado(true);
        m_carro = carro;
        return true;
    }

    bool devolverCarro(){
        if(m_carro == NULL){
            cout << "n tem carro alugado" << endl;
            return false;
        }
        m_carro->setAlugado(false);
        m_carro = NULL;
    }
    //===========================================================================================================
    bool alugarMoto(motos *moto){
        if(moto->getAlugado() == true){
            cout << "esta moto ja está alugado" << endl;
            return false;
        }
        moto->setAlugado(true);
        m_moto = moto;
        return true;
    }

    bool devolverMoto(){
        if(m_moto == NULL){
            cout << "n tem moto alugada" << endl;
            return false;
        }
        m_moto->setAlugado(false);
        m_moto = NULL;
    }

    bool showTudo() {
        if(m_carro == NULL && m_moto != NULL){
            cout << "id = " << m_id << " / nome = " << m_name << " / moto alugada = " << m_moto->getModelo() << endl;
        }else if(m_moto == NULL && m_carro != NULL){
            cout << "id = " << m_id << " / nome = " << m_name << " / Carro alugado = " << m_carro->getModelo() << endl;
        }else if(m_moto != NULL && m_carro != NULL){
            cout << "id = " << m_id << " / nome = " << m_name << " / Carro alugado = " << m_carro->getModelo() << " / Moto alugada = " << m_moto->getModelo() <<endl;
        }else{
            cout << "id = " << m_id << " / nome = " << m_name << " / nenhum carro ou moto alugado"<< endl;
        }
    }
};
#endif // CLIENTE_HPP

