/*
 * Title: PrensaC   
 * Author: Mateus Joaquim Machado
 *
 * Created on 23 de Junho de 2022, 11:01
 */

#include <xc.h>          //***inclus?o da biblioteca do compilador
#include <pic16f877a.h>  //***inclus?o da biblioteca do chip espec?fico
#include <stdio.h>       //***inclus?o da biblioteca standard padr?o "C"


#define _XTAL_FREQ 4000000 //***Defini a frequencia do clock, 4Mhz neste caso

__bit btn1;
__bit btn2;
int valor;

void main(void) 
{
  // static __bit led;   // tipo de dados bit precisa ser global ou 
                         // static para ser local. Static fica local na mem?ria
   TRISB = 0b11111111;    //***configurando a porta B como sa?da
   PORTB = 0;             //*** inicializando port B com 0V em todos pinos
   TRISD = 0b0000000;//*** configurando port C como entrada, todos pinos
   PORTDbits.RD6 = 1;
                        
   while (1){
       
       btn1 = PORTBbits.RB0;
       btn2 = PORTBbits.RB1;
       
       if(btn1 == 0 && btn2 == 0){
           
           PORTDbits.RD7 = 1;
           PORTDbits.RD6 = 0;
           
       }else{
           __delay_ms(2000);
           
           PORTDbits.RD7 = 0;
           PORTDbits.RD6 = 1;
       }
   }
}