/*
 * Title: Jogo Do Botão   
 * Author: Mateus Joaquim Machado
 *
 * Created on 23 de Junho de 2022, 11:24
 
 3. Desenvolva um sistema embarcado com dois botões. Um botão será o incremento 
 e o outro o decremento.  Ambos mudarão o valor de uma variável. 
 Quando a variável chegar ao valor de 10 um led deve acender e quando estiver 
 em 0 (zero) outro led deve acender. Para incrementar e decrementar, subrotinas 
 devem ser chamadas. Usar passagem de parâmetro nas subrotinas.
 
  
 */

#include <xc.h>          //***inclus?o da biblioteca do compilador
#include <pic16f877a.h>  //***inclus?o da biblioteca do chip espec?fico
#include <stdio.h>       //***inclus?o da biblioteca standard padr?o "C"


#define _XTAL_FREQ 4000000 //***Defini a frequencia do clock, 4Mhz neste caso

__bit btn1;
__bit btn2;
int contador = 5;

void main(void) 
{
  // static __bit led;   // tipo de dados bit precisa ser global ou 
                         // static para ser local. Static fica local na mem?ria
   TRISB = 0b11111111;    //***configurando a porta B como sa?da
   PORTB = 0;             //*** inicializando port B com 0V em todos pinos
   TRISD = 0b0000000;//*** configurando port C como entrada, todos pinos
   PORTD = 0; 
                        
   while (1){
       
       btn1 = PORTBbits.RB0;
       btn2 = PORTBbits.RB1;
       
       if(btn1 == 0){
           
           contador++;
           
       }
       if(btn2 == 0){
           
           contador--;
           
       }
       
       if(contador == 10){
           
           PORTDbits.RD6 = 1;
           __delay_ms(2000);
           PORTDbits.RD6 = 0;
           contador = 5;
           
       }else if(contador == 0){
           
           PORTDbits.RD7 = 1;
           __delay_ms(2000);
           PORTDbits.RD7 = 0;
           contador = 5;
           
       }
       __delay_ms(300);
   }
}