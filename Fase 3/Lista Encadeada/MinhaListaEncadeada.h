#ifndef DEC0006_MINHA_LISTA_ENCADEADA_H
#define DEC0006_MINHA_LISTA_ENCADEADA_H

#include <cstddef>
// std::size_t

#include "Elemento.h"
// Elemento
#include "ListaEncadeadaAbstrata.h"
#include "excecoes.h"
// ExcecaoDadoInexistente
// ExcecaoListaEncadeadaVazia
// ExcecaoNaoImplementado
// ExcecaoPosicaoInvalida

/**
 * @brief Uma lista encadeada de dados.
 *
 * @tparam T O tipo dos dados armazenados na lista.
 */
template<typename T>
class MinhaListaEncadeada: public ListaEncadeadaAbstrata<T>
{
    public:
    MinhaListaEncadeada() {};
    MinhaListaEncadeada(size_t tamanho, Elemento<T>* primeiro){
        this->_primeiro = primeiro;
        this->_tamanho = tamanho;
    };
    ~MinhaListaEncadeada() {};
    
    virtual std::size_t tamanho() const{

        return this->_tamanho;

    };

    virtual bool vazia() const{
         if(this->_tamanho>0){
             
             return false;

         }
         else{
            return true;
         }
    };

    virtual std::size_t posicao(T dado) const{
        
        if(this->_tamanho  > 0){

            Elemento<T>* elementoAtual = this->_primeiro;

            for (size_t i = 1; i <= this->_tamanho; i++){

                if(elementoAtual->dado == dado){
                    return i-1;
                }else{
                    elementoAtual = elementoAtual->proximo;
                }
                
            }
            throw ExcecaoDadoInexistente();
            return 0;
        }else{
            throw ExcecaoListaEncadeadaVazia();
            return 0;
        }
        
    };

    virtual bool contem(T dado) const{
        if(this->_tamanho > 0){

            Elemento<T>* elementoAtual = this->_primeiro;

            for(size_t i = 1; i <= this->_tamanho; i++){
                if(elementoAtual->dado == dado){
                        return true;
                }else{
                    elementoAtual = elementoAtual->proximo;
                }
            }
            return false;
        }else{
            return false;
        }
    };

    virtual void inserirNoInicio(T dado){
        Elemento<T>* novoElemento = new Elemento<T>(dado, this->_primeiro);
        this->_primeiro = novoElemento;
        this->_tamanho++;
    };
   
    virtual void inserir(std::size_t posicao, T dado){

        if(this->_tamanho > 0){

            if(posicao >= 0 && posicao <= this->_tamanho){

                Elemento<T>* elementoAtual = this->_primeiro;
                Elemento<T>* novoElemento = new Elemento<T>(dado, nullptr);

                if(posicao == 0){
                    inserirNoInicio(dado);
                }else if(posicao == this->_tamanho){
                    inserirNoFim(dado);
                }else{
                    
                    for(size_t i = 0; i <= posicao;i++){

                        if(i == (posicao-1)){
                            novoElemento->proximo = elementoAtual->proximo;
                            elementoAtual->proximo = novoElemento;
                        }else{
                            elementoAtual = elementoAtual->proximo;
                        }
                    }
                    this->_tamanho++;
                }
            }else{
                throw ExcecaoPosicaoInvalida();
            }

        }
    };
    
    virtual void inserirNoFim(T dado){

        if(this->_tamanho>0){
            
            Elemento<T>* elementoAtual = this->_primeiro;
            Elemento<T>* novoElemento = new Elemento<T>(dado, nullptr);

            for(size_t i = 1; i <= this->_tamanho; i++){
                
                if(i == this->_tamanho){

                    elementoAtual->proximo = novoElemento;

                }else{
                    elementoAtual = elementoAtual->proximo;
                }
            }
            this->_tamanho++;
        }else{
            inserirNoInicio(dado);
        }
    };

    virtual T removerDoInicio(){

        if(this->_tamanho > 0){

            Elemento<T>* elementoAtual = this->_primeiro;
            Elemento<T>* proxElemento = elementoAtual->proximo;
            T dado = elementoAtual->dado;
        
            delete elementoAtual;

            this->_primeiro = proxElemento;
            this->_tamanho--;
            return dado;

        }else{
            throw ExcecaoListaEncadeadaVazia();
        }

    };
    
    virtual T removerDe(std::size_t posicao){
        
        if(this->_tamanho > 0){
           if(posicao >= 0 && posicao <= (this->_tamanho-1)){
                
                if(posicao == 0){

                    removerDoInicio();

                }else if(posicao == this->_tamanho){

                    removerDoFim();

                }else{

                    Elemento<T>* elementoAtual = this->_primeiro;
                    Elemento<T>* elementoAnterior = this->_primeiro;
                    Elemento<T>* proxElemento = nullptr;
                    T dado;

                    for(size_t i = 0; i <= posicao; i++){

                        if(i == (posicao-1)){

                            elementoAnterior = elementoAtual;

                        }
                        if(i == posicao){

                            dado = elementoAtual->dado;
                            proxElemento = elementoAtual->proximo;

                            delete elementoAtual;

                            elementoAnterior->proximo = proxElemento;
                        
                        }else{
                            elementoAtual = elementoAtual->proximo;
                        }
                    }
                    this->_tamanho--;
                    return dado;
                }
            }else{

                throw ExcecaoPosicaoInvalida();

            }   
        }else{

            throw ExcecaoPosicaoInvalida();

        }
    };

    virtual T removerDoFim(){
        if(this->_tamanho > 0){

            Elemento<T>* elementoAtual = this->_primeiro;
            T dado;

            for(size_t i = 1; i <=this->_tamanho; i++){

                if(i == (this->_tamanho-1)){

                    elementoAtual->proximo == nullptr;

                }
                if(i == this->_tamanho){

                    dado = elementoAtual->dado;


                    delete elementoAtual;
                }else{
                    elementoAtual = elementoAtual->proximo;
                }
            }
            
            this->_tamanho--;
            return dado;

        }else{

            throw ExcecaoListaEncadeadaVazia();

        }
    };

    virtual void remover(T dado){

        if(this->_tamanho > 0){

            Elemento<T>* elementoAtual = this->_primeiro;

            for(size_t i = 1; i <= this->_tamanho;i++){

                if(elementoAtual->dado == dado && i == 1){

                    removerDoInicio();

                }else if(elementoAtual->dado == dado && i == this->_tamanho){

                    removerDoFim();

                }else if(elementoAtual->dado == dado){

                    removerDe(i-1);

                }
            }
            throw ExcecaoDadoInexistente();
        }else{
            throw ExcecaoListaEncadeadaVazia();
        }
    };
};

#endif
