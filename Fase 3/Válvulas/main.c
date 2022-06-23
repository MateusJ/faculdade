/**
 Title: válvulas   
 Author: Mateus Joaquim Machado
 
 Created on 23 de Junho de 2022, 11:24
 
 4. Desenvolver um sistema  embarcado(Embedded systems) para automatizar uma 
 empresa de tintas. A lógica de funcionamento é:
 1-As válvulas Y1 e Y2 inicial fechadas;
 2-Tanque A e B iniciam fechados;
 3- Y3 aberto;
 4-O sistema fica parado até que o botão liga seja acionado;
 5- Quando acionado, abrem-se Y1 e Y2 e fecha-se Y3 até que o sensor  Sn seja 
 acionado;
 6-Após Sn acionado, fecha y1 e y2, liga M1 por 10s para misturar os elementos;
 7- Depois de misturados abre Y3 para escoar o novo produto;
 8- Aguarda-se um novo ciclo;
 **/

#include <xc.h>          //***inclus?o da biblioteca do compilador
#include <pic16f877a.h>  //***inclus?o da biblioteca do chip espec?fico
#include <stdio.h>       //***inclus?o da biblioteca standard padr?o "C"


#define _XTAL_FREQ 4000000 //***Defini a frequencia do clock, 4Mhz neste caso

__bit sn;
__bit ligar;
__bit teste = 0;

void main(void) 
{
  // static __bit led;   // tipo de dados bit precisa ser global ou 
                         // static para ser local. Static fica local na mem?ria
   TRISB = 0b00100001;    //***configurando a porta B como sa?da
   PORTB = 0;             //*** inicializando port B com 0V em todos pinos
   OPTION_REG = 0b11111111;
   PORTBbits.RB3 = 1;
                        
   while (1){
       
       ligar = PORTBbits.RB5;
       
       if(ligar == 0){
           
           PORTBbits.RB3 = 0;
           PORTBbits.RB1 = 1;
           PORTBbits.RB2 = 1;
           
           while (teste == 0){
               
               sn = PORTBbits.RB0;
               if(sn == 0){
                   
                  PORTBbits.RB1 = 0;
                  PORTBbits.RB2 = 0;
                  PORTBbits.RB4 = 1;
                  
                  __delay_ms(10000);
                  
                  PORTBbits.RB3 = 1;
                  PORTBbits.RB4 = 0;
                  
                  teste = 1;
                  
               }
           }
           
       }
       
   }
}