#include "cliente.hpp"
#include "veiculos.hpp"
#include "carro.hpp"
#include "moto.hpp"

int main(){

    //Criando Clientes
    cliente *p1 = new cliente(1, "Mateus Joaquim Machado", NULL, NULL);
    cliente *p2 = new cliente(2, "Gabriel Silveira da Silva", NULL, NULL);
    cliente *p3 = new cliente(3, "Ventilador Jonas", NULL, NULL);

    //Criando Carros disponiveis
    carros *gol = new carros("gol", "def-5678", 20000, false, "automatico");
    carros *fordK = new carros("KaBuloso", "abc-1234", 52000, false, "manual");

    //Criando Motos Disponiveis
    motos *biz = new motos("Biz", "biz-8900", 2, false, "pedal");
    motos *cg125 = new motos("cg125", "cgt-0000", 5, false, "eletrica");

    //Checando Carros e Motos
    gol->showC();
    fordK->showC();
    biz->showM();
    cg125->showM();

    cout<<endl;
    cout<<endl;
    //Alugando Carros e Motos
    p1->alugarCarro(gol);
    p3->alugarMoto(biz);

    p2->alugarCarro(fordK);
    p2->alugarMoto(cg125);

    cout<<endl;
    cout<<endl;

    //Mostrando Carro e Moto Após Aluguel
    fordK->showC();
    biz->showM();


    //Mostrando os clientes e seus respectivos alugueis
    p1->showTudo();
    cout<<endl;
    p3->showTudo();
    cout<<endl;
    p2->showTudo();
    cout<<endl;
    cout<<endl;


    delete p1;
    delete p2;
    delete p3;
    delete gol;
    delete fordK;
    delete biz;
    delete cg125;
};
