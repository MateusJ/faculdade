#ifndef MINHAARVOREDEBUSCABINARIA_HPP
#define MINHAARVOREDEBUSCABINARIA_HPP

#include "ArvoreDeBuscaBinaria.h"
#include <cassert>
#include <utility>

/**
 * @brief Representa uma árvore binária de busca.
 * 
 * @tparam T O tipo de dado guardado na árvore.
 */
template<typename T>
class MinhaArvoreDeBuscaBinaria : public ArvoreDeBuscaBinaria<T>
{
    public:

    /** Construtores e Destrutores **/
    MinhaArvoreDeBuscaBinaria() {};
    MinhaArvoreDeBuscaBinaria(Nodo<T>* raiz){
        this->_raiz = raiz;
    };
    ~MinhaArvoreDeBuscaBinaria() {
         
         deleteNodos(this->_raiz);
         
    };
    
    void deleteNodos(Nodo<T>* nodo){
        
        if(nodo != nullptr){
        
            deleteNodos(nodo->filhoEsquerda);
            deleteNodos(nodo->filhoDireita);
            delete nodo;
                
        }
    }

    /** Arruma Altura **/

    void arrumaAltura(Nodo<T>* nodo){

        if(this->_raiz != nullptr){
        if(nodo->filhoEsquerda != nullptr){
            arrumaAltura(nodo->filhoEsquerda);
        }
        if(nodo->filhoDireita != nullptr){
            arrumaAltura(nodo->filhoDireita);
        }
        
        if(nodo->filhoDireita != nullptr && nodo->filhoEsquerda != nullptr){

            if(nodo->filhoDireita->altura >= nodo->filhoEsquerda->altura){

                nodo->altura = nodo->filhoDireita->altura+1;

            }else{

                nodo->altura = nodo->filhoEsquerda->altura+1;

            }

        }else if(nodo->filhoDireita == nullptr && nodo->filhoEsquerda == nullptr){
                
            nodo->altura = 0;
                
        }else if(nodo->filhoDireita == nullptr){

            nodo->altura = nodo->filhoEsquerda->altura+1;

        }else if(nodo->filhoEsquerda == nullptr){

            nodo->altura = nodo->filhoDireita->altura+1;

        }

    }
    }

    /** Função getPai **/

    Nodo<T>* getPai(T chave, Nodo<T>* nodo){

        if(nodo->filhoDireita != nullptr && chave == nodo->filhoDireita->chave){

            return nodo;

        }else if(nodo->filhoEsquerda != nullptr && chave == nodo->filhoEsquerda->chave){

            return nodo;

        }else if(chave>nodo->chave){

            getPai(chave, nodo->filhoDireita);

        }else{
            getPai(chave, nodo->filhoEsquerda);
        }

    }

    /** Função Vazia **/
    virtual bool vazia() const{
        if(this->_raiz != nullptr){
            return false;
        }else{
            return true;
        }
    };
    
    /** Funções Quantidade **/
    int getQuantidade(Nodo<T>* nodo) const{
        int conta = 0;
        if(nodo != nullptr){
            
            conta++;

            conta = conta + getQuantidade(nodo->filhoEsquerda);
            conta = conta + getQuantidade(nodo->filhoDireita);

            return conta;
        }
        return conta;
    }
    
    virtual int quantidade() const{

        return getQuantidade(this->_raiz);

    };
    
    /** Funções Contém **/
    bool testeContem(T chave,Nodo<T>* nodo) const{

        bool teste = false;

        if(nodo != nullptr){

            if(chave == nodo->chave){

                teste = true;

            }else if(chave > nodo->chave){

                teste = testeContem(chave, nodo->filhoDireita);

            }else if(chave < nodo->chave){

                teste = testeContem(chave, nodo->filhoEsquerda);

            }

            return teste;
        }
        return false;
        
    };

    virtual bool contem(T chave) const{
        
        return testeContem(chave, this->_raiz); ;

    };


    /** Funções Altura **/
    std::optional<int> getAltura(T chave, Nodo<T>* nodo) const{
        std::optional<int> teste = std::nullopt;

        if(nodo != nullptr){

            if(chave == NULL){

                return nodo->altura;
        
            }else if(chave == nodo->chave){

                teste = nodo->altura;

            }else if(chave > nodo->chave){

                teste = getAltura(chave, nodo->filhoDireita);

            }else if(chave < nodo->chave){

                teste = getAltura(chave, nodo->filhoEsquerda);

            }

            return teste;
        }
        
        return teste;

    };

    virtual std::optional<int> altura(T chave) const{

        return getAltura(chave, this->_raiz);

    };

    /** Funções Novo Nodo **/

    void newNodo(T chave, Nodo<T>* nodo){
        
        if(nodo !=nullptr){


            if(chave > nodo->chave){

                if(nodo->filhoDireita == nullptr){

                    Nodo<T>* novoNodo = new Nodo<T>{chave, 0, nullptr,nullptr};
                    nodo->filhoDireita = novoNodo;

                    arrumaAltura(this->_raiz);

                }else{

                    newNodo(chave, nodo->filhoDireita);

                }
                
                
            }else if(chave < nodo->chave ){

                if(nodo->filhoEsquerda == nullptr){

                    Nodo<T>* novoNodo = new Nodo<T>{chave, 0, nullptr,nullptr};
                    nodo->filhoEsquerda = novoNodo;

                    arrumaAltura(this->_raiz);

                }else{

                    newNodo(chave, nodo->filhoEsquerda);

                }
                
            }

            

        }

    };

    virtual void inserir(T chave) {

        if(this->_raiz != nullptr){

            newNodo(chave, this->_raiz);

        }else{

            Nodo<T>* novoNodo = new Nodo<T>{chave, 0, nullptr,nullptr};
            this->_raiz = novoNodo;

        }
    };

    /** Funções Remoção **/

    void removeFolha(T chave, Nodo<T>* nodo){
        
        if(nodo != nullptr){

            if(nodo->filhoEsquerda != nullptr && chave == nodo->filhoEsquerda->chave){

                Nodo<T>* pai = nodo;

                Nodo<T>* filho = nodo->filhoEsquerda;

                delete filho;

                pai->filhoEsquerda = nullptr;

                arrumaAltura(this->_raiz);
                

            }else if(nodo->filhoDireita != nullptr && chave == nodo->filhoDireita->chave){

                Nodo<T>* pai = nodo;

                Nodo<T>* filho = nodo->filhoDireita;

                delete filho;

                pai->filhoDireita = nullptr;

                arrumaAltura(this->_raiz);

            }else if(chave == this->_raiz->chave){
            
                Nodo<T>* nodoDelete = nodo;

                delete nodoDelete;

                this->_raiz = nullptr;

                arrumaAltura(this->_raiz);

            }else{
                
                removeFolha(chave, nodo->filhoEsquerda);
                removeFolha(chave, nodo->filhoDireita);

            }


        }

    }

    void removeNodo(T chave, Nodo<T>* nodo){

        

        if(chave == this->_raiz->chave){

                Nodo<T>* nodoDelete = nodo;

            if(nodo->filhoDireita != nullptr){

                Nodo<T>* nodoExtremo = nodo->filhoDireita;

                while(true){

                    if(nodoExtremo->filhoEsquerda != nullptr){

                        nodoExtremo = nodoExtremo->filhoEsquerda;

                    }else{
                        break;
                    }
                }

                Nodo<T>* paiExtremo = getPai(nodoExtremo->chave, this->_raiz);

                if(paiExtremo != nodoDelete){

                    paiExtremo->filhoEsquerda = nodoExtremo->filhoDireita;

                    nodoExtremo->filhoDireita = nodo->filhoDireita;
                    nodoExtremo->filhoEsquerda = nodo->filhoEsquerda;
                        
                }else{

                    nodoExtremo->filhoEsquerda = nodo->filhoEsquerda;

                }


                this->_raiz = nodoExtremo;

                delete nodoDelete;

                arrumaAltura(this->_raiz);
                
            }

        } else if(chave == nodo->chave){
            
            Nodo<T>* nodoDelete = nodo;

            if(nodo->filhoDireita != nullptr){

                Nodo<T>* nodoExtremo = nodo->filhoDireita;

                while(true){

                    if(nodoExtremo->filhoEsquerda != nullptr){

                        nodoExtremo = nodoExtremo->filhoEsquerda;

                    }else{
                        break;
                    }
                }

                Nodo<T>* pai = getPai(chave, this->_raiz);
                Nodo<T>* paiExtremo = getPai(nodoExtremo->chave, this->_raiz);

                if(paiExtremo != nodoDelete){

                    paiExtremo->filhoEsquerda = nodoExtremo->filhoDireita;
                    nodoExtremo->filhoDireita = nodo->filhoDireita;
                    nodoExtremo->filhoEsquerda = nodo->filhoEsquerda;

                }else{

                    nodoExtremo->filhoEsquerda = nodo->filhoEsquerda;

                }

                

                if(pai->filhoDireita->chave == nodo->chave){

                    pai->filhoDireita = nodoExtremo;

                }else{

                    pai->filhoEsquerda = nodoExtremo;

                }

                delete nodoDelete;
                arrumaAltura(this->_raiz);
                
                

            }else if(nodo->filhoDireita == nullptr){

                Nodo<T>* pai = getPai(chave, this->_raiz);
                Nodo<T>* nodoDelete = nodo;

                if(pai->filhoDireita->chave == nodo->chave){

                    pai->filhoDireita = nodo->filhoEsquerda;

                }else{

                    pai->filhoEsquerda = nodo->filhoEsquerda;

                }

                delete nodoDelete;

                arrumaAltura(this->_raiz);
                

            }


        }else{
            if(chave > nodo->chave){

                removeNodo(chave, nodo->filhoDireita);

            }else{

                removeNodo(chave, nodo->filhoEsquerda);

            }
        }
        
    }

    void remocao(T chave, Nodo<T>* nodo){

        if(nodo != nullptr){

            if(chave == nodo->chave){

                if(nodo->filhoDireita == nullptr && nodo->filhoEsquerda == nullptr){

                    removeFolha(chave, this->_raiz);

                }else{

                    removeNodo(chave, this->_raiz);

                }
            }else{
                remocao(chave, nodo->filhoEsquerda);
                remocao(chave, nodo->filhoDireita);
            }
            
        }
        

    }


    virtual void remover(T chave) {

        return remocao(chave, this->_raiz);

    };

    /** Funções Filho A Esquerda **/

    std::optional<T> getFilhoEsquerda(T chave, Nodo<T>* nodo) const {

        if(nodo != nullptr){
            
            std::optional<T> teste = std::nullopt;

            Nodo<T>* nodoEsquerda = nodo->filhoEsquerda;

            if(chave == nodo->chave){
                
                if(nodoEsquerda != nullptr){

                    return nodoEsquerda->chave;

                }else{
                    return std::nullopt;
                }

                
                
            }else if(chave > nodo->chave){

                teste = getFilhoEsquerda(chave, nodo->filhoDireita);

            }else if(chave < nodo->chave){

                teste = getFilhoEsquerda(chave, nodo->filhoEsquerda);

            }

            return teste;

        }else{

            return std::nullopt;

        }
    }

    virtual std::optional<T> filhoEsquerdaDe(T chave) const {
        
        return getFilhoEsquerda(chave, this->_raiz);

    };

    /**
     * @brief Busca a chave do filho a direita de uma (sub)arvore
     * @param chave chave da arvore que eh pai do filho a direita
     * @return Chave do filho a direita. Se chave nao esta na arvore, retorna nullptr
     */

    std::optional<T> getFilhoDireita(T chave, Nodo<T>* nodo) const{

        if(nodo != nullptr){
            
            std::optional<T> teste = std::nullopt;

            Nodo<T>* nodoDireita = nodo->filhoDireita;

            if(chave == nodo->chave){
                
                if(nodoDireita != nullptr){

                    return nodoDireita->chave;

                }else{
                    return std::nullopt;
                }

                
                
            }else if(chave > nodo->chave){

                teste = getFilhoDireita(chave, nodo->filhoDireita);

            }else if(chave < nodo->chave){

                teste = getFilhoDireita(chave, nodo->filhoEsquerda);

            }

            return teste;

        }else{

            return std::nullopt;

        }

    }

    virtual std::optional<T> filhoDireitaDe(T chave) const {

        return getFilhoDireita(chave, this->_raiz);

    };

    /** Sort Em Ordem **/

    ListaEncadeadaAbstrata<T>* getListaEmOrdem(Nodo<T>* nodo, MinhaListaEncadeada<T>* lista) const{

        if(nodo != nullptr){

            getListaEmOrdem(nodo->filhoEsquerda, lista);
            lista->inserirNoFim(nodo->chave);
            getListaEmOrdem(nodo->filhoDireita, lista);

        }
         return lista;

    };

    virtual ListaEncadeadaAbstrata<T>* emOrdem() const {

        MinhaListaEncadeada<T>* lista = new MinhaListaEncadeada<T>{};

        return getListaEmOrdem(this->_raiz, lista);

    };

    /** Sort Pre Ordem**/

    ListaEncadeadaAbstrata<T>* getListaPreOrdem(Nodo<T>* nodo, MinhaListaEncadeada<T>* lista) const{

        if(nodo != nullptr){

            lista->inserirNoFim(nodo->chave);
            getListaPreOrdem(nodo->filhoEsquerda, lista);
            getListaPreOrdem(nodo->filhoDireita, lista);
            
        }
         return lista;

    };

    virtual ListaEncadeadaAbstrata<T>* preOrdem() const {

        MinhaListaEncadeada<T>* lista = new MinhaListaEncadeada<T>{};

        return getListaPreOrdem(this->_raiz, lista);
    };

    /** Sort Pos Ordem **/

    ListaEncadeadaAbstrata<T>* getListaPosOrdem(Nodo<T>* nodo, MinhaListaEncadeada<T>* lista) const{

        if(nodo != nullptr){

            
            getListaPosOrdem(nodo->filhoEsquerda, lista);
            getListaPosOrdem(nodo->filhoDireita, lista);
            lista->inserirNoFim(nodo->chave);
            
        }
         return lista;

    };

    virtual ListaEncadeadaAbstrata<T>* posOrdem() const {

        MinhaListaEncadeada<T>* lista = new MinhaListaEncadeada<T>{};

        return getListaPosOrdem(this->_raiz, lista);
    };
};

#endif
