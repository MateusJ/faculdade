/*
 * Title: PrensaC   
 * Author: Mateus Joaquim Machado
 *
 * Created on 23 de Junho de 2022, 11:01
 */
#define _XTAL_FREQ 4000000 //***Defini a frequencia do clock, 4Mhz neste caso

#define RS RD2
#define EN RD3
#define D4 RD4
#define D5 RD5
#define D6 RD6
#define D7 RD7

#include <xc.h>          //***inclus?o da biblioteca do compilador
#include <pic16f877a.h>  //***inclus?o da biblioteca do chip espec?fico
#include <stdio.h>  //***inclus?o da biblioteca standard padr?o "C"

#include "lcd.h"




//Configurações de bit
#pragma config WDTE = OFF   
#pragma config FOSC = HS    
#pragma config PWRTE = ON   
#pragma config BOREN = ON  

//Define pinos referentes a interface com LCD



__bit btnLuz;
__bit btnAbre;
__bit btnFecha;
__bit btnVent;
__bit sensorAbre;
__bit sensorFecha;
__bit btnTroca;
__bit trocado;

int testeLuz = 0;
int testeVent = 0;
int testeCort = 0;
int deuPau = 0;

int meioTempo = 0;
float valor;
float temperatura;
int sec = 0;
int min = 0;
int hora = 0;
int trocaHora = 0;
char buffer[20];

void main(void) 
{
  //Inicialização
   TRISB = 0b11111111;    
   PORTB = 0;            
   TRISC = 0b00000000;
   PORTC = 0;
   TRISD = 0x00;
   OPTION_REG = 0b01111111;
   
   //configurações de interrupção
   INTCONbits.GIE = 1;
   INTCONbits.PEIE = 1;
   PIE1bits.TMR1IE = 1;
   
   //configurações de timer
   
   T1CONbits.TMR1CS = 0;
   T1CONbits.T1CKPS0 = 1;
   T1CONbits.T1CKPS1 = 1;
   
   TMR1L = 0xDC;
   TMR1H = 0x0B;
   
   T1CONbits.TMR1ON = 1;
   
   //configurando porta analogica
   ADCON1bits.PCFG0   = 0; 
   ADCON1bits.PCFG1   = 1;  
   ADCON1bits.PCFG2   = 1;  
   ADCON1bits.PCFG3   = 1;  
   
   //clock do conversor analogico
   ADCON0bits.ADCS0 = 0  ;
   ADCON0bits.ADCS1 = 0  ;
   
   ADCON1bits.ADFM = 0   ;
   
   ADRESL = 0x00;
   ADRESH = 0x00;
   
   ADCON0bits.ADON = 1;
   
   //iniciando o LCD
   Lcd_Init();
   Lcd_Clear();
   
   Lcd_Set_Cursor(1,1);  
   Lcd_Write_String("Relogio:");
   
   while (1){
       
       sensorAbre = PORTBbits.RB5;
       sensorFecha = PORTBbits.RB6;
       btnTroca = PORTBbits.RB7;
       
       if(btnTroca == 0){
           trocaHora++;
           trocado = 1;
           __delay_ms(300);
       }
       
       if(trocaHora == 1 && trocado == 1){
            hora = 6;
            min = 59;
            sec = 55;
            trocado = 0;
       }
       if(trocaHora == 2 && trocado == 1){
            hora = 18;
            min = 29;
            sec = 55;
            trocado = 0;
            
       }
       if(trocaHora == 3 && trocado == 1){
            hora = 23;
            min = 59;
            sec = 55;
            trocado = 0;
            trocaHora = 0;
       }
       
        if(sec == 60){
           min++;
           sec = 0;
        }
        if(min == 60){
            hora++;
            min = 0;
        }
        if(hora == 24){
            min = 0;
            sec = 0;
            hora = 0;
        }
               
        sprintf(buffer, "%2.2d : %2.2d : %2.2d", hora, min, sec);
        Lcd_Set_Cursor(2,1);
        Lcd_Write_String(buffer);
        
        if(deuPau == 0){
            ADCON0bits.CHS0 = 0;
            ADCON0bits.CHS1 = 0;
            ADCON0bits.CHS2 = 0;
       
            ADCON0bits.GO = 1;  //converte
            __delay_us(10);     //tempo de convers?o
            valor = ADRESH;     // passa valores convertido do reg para a vari?vel
            temperatura = valor*4.88/10;
        
            if(hora == 7 && min == 0 && sec == 0){
                
                if(RB5 == 1){
                    PORTCbits.RC1 = 1;
                    testeCort = 1;
                }
            
                if(testeVent == 1){
                    PORTC = 0b0001010;
                }
            
            }
            if(hora == 18 && min == 30 && sec == 0){
                if(testeLuz == 0){
                    PORTCbits.RC0 = 1;
                    testeLuz = 1;
                }
            
                if(RB6 == 1){
                    PORTCbits.RC2 = 1;
                    testeCort = 2;
                    
                    if(testeVent == 1){
                        PORTC = 0b0001101;
                    }
                }else if(testeVent == 1){
                    PORTC = 0b0001001;
                }
            
            }
            if(hora == 0 && min == 0 && sec == 0){
                if(testeLuz == 1){
                    testeLuz = 0;
                    PORTCbits.RC0 = 0;
                }
                if(testeVent == 1){
                    PORTC = 0b0001000;
                }
            }
        
            if(valor >= 14 && testeVent == 0){
            
                PORTCbits.RC3 = 1;
                testeVent = 1;
                if(testeCort == 1){
                    PORTC = 0b00001010;
                }
                if(testeCort == 2){
                    PORTC = 0b00001101;
                }
            
            }
            if(valor < 14 && testeVent == 1){
            
                PORTCbits.RC3 = 0;
                testeVent = 0;
            
                if(testeCort == 1){
                    PORTC = 0b00000010;
                }
                if(testeCort == 2){
                    PORTC = 0b00000101;
                }
            
            }
        
        
            if(RB6 == 0 && testeCort == 2){
                PORTCbits.RC2 = 0;
                testeCort = 0;
                if(testeVent == 1){
                    PORTC = 0b0001001;
                }
            }
        
            if(RB5 == 0 && testeCort == 1){
                PORTCbits.RC1 = 0;
                testeCort = 0;
                if(testeVent == 1){
                    PORTC = 0b0001000;
                }
            }
        }
        if(deuPau == 1){
            
            btnLuz = PORTBbits.RB1;
            btnAbre = PORTBbits.RB2;
            btnFecha = PORTBbits.RB3;
            btnVent = PORTBbits.RB4;
            
            if(btnLuz == 0){
                
                PORTCbits.RC0 = 1;
                testeLuz = 1;
                
                if(testeVent == 1 && testeCort == 0){
                    PORTC = 0b00001001;
                }
                
                if(testeVent == 1 && testeCort >= 1){
                    if(testeCort == 1){
                        PORTC = 0b00001011;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00001101;
                    }
                }
                
                if(testeCort >= 1 && testeVent == 0){
                    if(testeCort == 1){
                        PORTC = 0b00000011;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00000101;
                    }
                }
            }
            if(btnVent == 0){
                
                PORTCbits.RC3 = 1;
                testeVent = 1;
                
                if(testeLuz == 1 && testeCort >=1){

                    if(testeCort == 1){
                        PORTC = 0b00001011;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00001101;
                    }

                }
                
                if(testeLuz == 1 && testeCort == 0){
                    PORTC = 0b00001001;
                }
                
                if(testeLuz == 0 && testeCort >= 1){
                    if(testeCort == 1){
                        PORTC = 0b00001010;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00001100;
                    }
                }
            }
            
            if(btnAbre == 0 || btnFecha == 0){
                
                if(btnAbre == 0){
                    testeCort = 1; 
                    PORTCbits.RC1 = 1;
                }
                
                if(btnFecha == 0){
                    testeCort = 2;
                    PORTCbits.RC2 = 1;
                }
                
                
                if(testeLuz == 1 && testeVent == 1){
                    
                    switch (testeCort){
                        case 1:
                            PORTC = 0b00001011;
                        break;
                        case 2:
                            PORTC = 0b00001101;
                            break;
                    }
                }
                if(testeLuz == 1 && testeVent == 0){
                    switch (testeCort){
                        case 1:
                            PORTC = 0b00000011;
                        break;
                        case 2:
                            PORTC = 0b00000101;
                        break;
                    }
                }
                if(testeLuz == 0 && testeVent == 1){
                    switch (testeCort){
                        case 1:
                            PORTC = 0b00001010;
                        break;
                        case 2:
                            PORTC = 0b00001100;
                        break;
                    }
                }
            }
            if(btnLuz == 1 && testeLuz == 1){
                
                PORTCbits.RC0 = 0;
                testeLuz = 0;
                
                if(testeVent == 1 && testeCort == 0){
                    PORTC = 0b00001000;
                }
                
                if(testeVent == 1 && testeCort >= 1){
                    if(testeCort == 1){
                        PORTC = 0b00001010;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00001100;
                    }
                }
                
                if(testeCort >= 1 && testeVent == 0){
                    if(testeCort == 1){
                        PORTC = 0b00000010;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00000100;
                    }
                }
            }
            
            if(sensorAbre == 0 && testeCort == 1){
                PORTCbits.RC2 = 0;
                testeCort = 0;
                
                if(testeLuz == 1 && testeVent == 1){
                    PORTC = 0b00001001;
                }
                if(testeLuz == 0 && testeVent == 1){
                    PORTC = 0b00001000;
                }
                if(testeLuz == 1 && testeVent == 0){
                    PORTC = 0b00000001;
                }
            }
            if(sensorFecha == 0 && testeCort == 2){
                PORTCbits.RC3 = 0;
                testeCort = 0;
                
                if(testeLuz == 1 && testeVent == 1){
                    PORTC = 0b00001001;
                }
                if(testeLuz == 0 && testeVent == 1){
                    PORTC = 0b00001000;
                }
                if(testeLuz == 1 && testeVent == 0){
                    PORTC = 0b00000001;
                }
            }
            if(btnVent == 1 && testeVent == 1){
                
                PORTCbits.RC3 = 0;
                testeVent = 0;
                
                if(testeLuz == 1 && testeCort >=1){

                    if(testeCort == 1){
                        PORTC = 0b00000011;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00000101;
                    }

                }
                
                if(testeLuz == 1 && testeCort == 0){
                    PORTC = 0b00000001;
                }
                
                if(testeLuz == 0 && testeCort >= 1){
                    if(testeCort == 1){
                        PORTC = 0b00000010;
                    }
                    if(testeCort == 2){
                        PORTC = 0b00000100;
                    }
                }
            }
        }
    }
}

//subrotina de interrupção do timer
   
   void __interrupt() TrataInt(void){
       
       if(TMR1IF){
           
           //reconfigurar timer
           PIR1bits.TMR1IF = 0;
           TMR1L = 0xDC;
           TMR1H = 0x0B;
           
           //tratar interrupção
           if(meioTempo == 0){
               
               meioTempo++;
               
           }else if(meioTempo == 1){
               
               sec++; 
               meioTempo--;
           }
        }
       
        if (INTF){  
            
            INTCONbits.INTF = 0;
            
            if(deuPau == 0){
                PORTC = 0b00000000;
                deuPau = 1;
                testeVent = 0;
                testeLuz = 0;
                testeCort = 0;
            }else
            
            if(deuPau == 1){
                PORTC = 0b00000000;
                deuPau = 0;
                testeVent = 0;
                testeLuz = 0;
                testeCort = 0;
            }
            
        }
       return;
    }