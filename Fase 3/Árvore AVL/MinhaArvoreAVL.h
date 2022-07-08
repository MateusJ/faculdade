#ifndef MINHA_ARVORE_AVL_HPP
#define MINHA_ARVORE_AVL_HPP

#include "MinhaArvoreDeBuscaBinaria.h"

/**
 * @brief Representa uma árvore AVL.
 * 
 * @tparam T O tipo de dado guardado na árvore.
 */
template <typename T>
class MinhaArvoreAVL final : public MinhaArvoreDeBuscaBinaria<T>
{
    
    ~MinhaArvoreAVL() {
         
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
    /** Achar Pai **/
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

    };

    /** Fator B **/
    int fatorB(Nodo<T>* nodo){

        int alturaE = 0;
        int alturaD = 0;

        if(nodo->filhoEsquerda != nullptr){

            alturaE = nodo->filhoEsquerda->altura;

        }else{

            alturaE = -1;

        }

        if(nodo->filhoDireita != nullptr){

            alturaD = nodo->filhoDireita->altura;

        }else{

            alturaD = -1;

        }

        return alturaE - alturaD;
        
    }


    /** Rotações **/

    /** Simples Direita **/
    void simplesDireita(Nodo<T>* pai, Nodo<T>* filho){
        
        pai->filhoEsquerda = filho->filhoDireita;
        
        filho->filhoDireita = pai;

        if(pai->chave == this->_raiz->chave){

            this->_raiz = filho;

        }else{

            Nodo<T>* paiDoPai = getPai(pai->chave, this->_raiz);

            if(paiDoPai->filhoDireita->chave == pai->chave){
                paiDoPai->filhoDireita = filho;
            }else{
                paiDoPai->filhoEsquerda = filho;
            }

        }

        arrumaAltura(this->_raiz);
    }


    /** Simples Esquerda **/

    void simplesEsquerda(Nodo<T>* pai, Nodo<T>* filho){
        
        pai->filhoDireita = filho->filhoEsquerda;
        
        filho->filhoEsquerda = pai;

        if(pai->chave == this->_raiz->chave){

            this->_raiz = filho;

        }else{

            Nodo<T>* paiDoPai = getPai(pai->chave, this->_raiz);

            if(paiDoPai->filhoDireita->chave == pai->chave){
                paiDoPai->filhoDireita = filho;
            }else{
                paiDoPai->filhoEsquerda = filho;
            }

        }

        arrumaAltura(this->_raiz);
        
    }

    /** Direita Esquerda **/
    void direitaEsquerda(Nodo<T>* pai, Nodo<T>* filho){

        Nodo<T>* paiExtremo = filho->filhoEsquerda;
        Nodo<T>* Extremo = paiExtremo->filhoDireita;

        filho->filhoEsquerda = Extremo;

        paiExtremo->filhoDireita = filho;

        pai->filhoDireita = paiExtremo;

        simplesEsquerda(pai, paiExtremo);

        arrumaAltura(this->_raiz);

    }


    /** Esquerda Direita **/
    void esquerdaDireita(Nodo<T>* pai, Nodo<T>* filho){

        Nodo<T>* paiExtremo = filho->filhoDireita;
        Nodo<T>* Extremo = paiExtremo->filhoEsquerda;

        filho->filhoDireita = Extremo;

        paiExtremo->filhoEsquerda = filho;

        pai->filhoEsquerda = paiExtremo;

        simplesDireita(pai, paiExtremo);

        arrumaAltura(this->_raiz);

    }

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

                    if(fatorB(nodo) == 2){ 

                        if(fatorB(nodo->filhoEsquerda) >= 0){

                            simplesDireita(nodo, nodo->filhoEsquerda);

                        }else if(fatorB(nodo->filhoEsquerda) < 0){

                            esquerdaDireita(nodo, nodo->filhoEsquerda);

                        }
                        
                    }else if(fatorB(nodo) == -2){

                        if(fatorB(nodo->filhoDireita) <= 0){

                            simplesEsquerda(nodo, nodo->filhoDireita);

                        }else if(fatorB(nodo->filhoDireita) > 0){

                            direitaEsquerda(nodo, nodo->filhoDireita);

                        }

                    }

                }
                
                
            }else if(chave < nodo->chave ){

                if(nodo->filhoEsquerda == nullptr){

                    Nodo<T>* novoNodo = new Nodo<T>{chave};
                    nodo->filhoEsquerda = novoNodo;

                    arrumaAltura(this->_raiz);

                }else{

                    newNodo(chave, nodo->filhoEsquerda);

                    if(fatorB(nodo) == 2){ 

                        if(fatorB(nodo->filhoEsquerda) >= 0){

                            simplesDireita(nodo, nodo->filhoEsquerda);

                        }else if(fatorB(nodo->filhoEsquerda) < 0){

                            esquerdaDireita(nodo, nodo->filhoEsquerda);

                        }

                    }else if(fatorB(nodo) == -2){

                        if(fatorB(nodo->filhoDireita)<= 0){

                            simplesEsquerda(nodo, nodo->filhoDireita);

                        }else if(fatorB(nodo->filhoDireita)> 0){

                            direitaEsquerda(nodo, nodo->filhoDireita);

                        }

                    }

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

            if(chave == nodo->chave){

                if(nodo->chave == this->_raiz->chave){

                    Nodo<T>* nodoDelete = nodo;

                    delete nodoDelete;

                    this->_raiz = nullptr;

                }else{

                    Nodo<T>* nodoDelete = nodo;
                    Nodo<T>* pai = getPai(nodo->chave, this->_raiz);

                    if(pai->filhoDireita != nullptr && pai->filhoDireita->chave == nodoDelete->chave){

                        delete nodoDelete;

                        pai->filhoDireita = nullptr;

                        arrumaAltura(this->_raiz);

                    }else{

                        delete nodoDelete;

                        pai->filhoEsquerda = nullptr;

                        arrumaAltura(this->_raiz);
                    }

                }

            }else{

                if(chave > nodo->chave){

                    removeFolha(chave, nodo->filhoDireita);

                    if(fatorB(nodo) == 2){ 

                        if(fatorB(nodo->filhoEsquerda) >= 0){

                            simplesDireita(nodo, nodo->filhoEsquerda);

                        }else if(fatorB(nodo->filhoEsquerda) < 0){

                            esquerdaDireita(nodo, nodo->filhoEsquerda);

                        }
                        
                    }else if(fatorB(nodo) == -2){

                        if(fatorB(nodo->filhoDireita) <= 0){

                            simplesEsquerda(nodo, nodo->filhoDireita);

                        }else if(fatorB(nodo->filhoDireita) > 0){

                            direitaEsquerda(nodo, nodo->filhoDireita);

                        }

                    }

                }else{

                    removeFolha(chave, nodo->filhoEsquerda);

                    if(fatorB(nodo) == 2){ 

                    if(fatorB(nodo->filhoEsquerda) >= 0){

                        simplesDireita(nodo, nodo->filhoEsquerda);

                    }else if(fatorB(nodo->filhoEsquerda) < 0){

                        esquerdaDireita(nodo, nodo->filhoEsquerda);

                    }
                }else if(fatorB(nodo) == -2){

                    if(fatorB(nodo->filhoDireita)<= 0){

                        simplesEsquerda(nodo, nodo->filhoDireita);

                    }else if(fatorB(nodo->filhoDireita)> 0){

                        direitaEsquerda(nodo, nodo->filhoDireita);
                        
                    }
                }

                }

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

                if(fatorB(nodo) == 2){ 

                        if(fatorB(nodo->filhoEsquerda) >= 0){

                            simplesDireita(nodo, nodo->filhoEsquerda);

                        }else if(fatorB(nodo->filhoEsquerda) < 0){

                            esquerdaDireita(nodo, nodo->filhoEsquerda);

                        }
                        
                    }else if(fatorB(nodo) == -2){

                        if(fatorB(nodo->filhoDireita) <= 0){

                            simplesEsquerda(nodo, nodo->filhoDireita);

                        }else if(fatorB(nodo->filhoDireita) > 0){

                            direitaEsquerda(nodo, nodo->filhoDireita);

                        }

                    }

            }else{

                removeNodo(chave, nodo->filhoEsquerda);

                if(fatorB(nodo) == 2){ 

                    if(fatorB(nodo->filhoEsquerda) >= 0){

                        simplesDireita(nodo, nodo->filhoEsquerda);

                    }else if(fatorB(nodo->filhoEsquerda) < 0){

                        esquerdaDireita(nodo, nodo->filhoEsquerda);

                    }
                }else if(fatorB(nodo) == -2){

                    if(fatorB(nodo->filhoDireita)<= 0){

                        simplesEsquerda(nodo, nodo->filhoDireita);

                    }else if(fatorB(nodo->filhoDireita)> 0){

                        direitaEsquerda(nodo, nodo->filhoDireita);
                        
                    }
                }

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
                if(chave > nodo->chave){

                    remocao(chave, nodo->filhoDireita);

                }else{

                    remocao(chave, nodo->filhoEsquerda); 

                }
                
            }
            
        }
        
    }

    virtual void remover(T chave) {

        return remocao(chave, this->_raiz);

    };

};



#endif