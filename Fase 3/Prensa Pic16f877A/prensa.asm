;*******************************************************************************
; UFSC- Universidade Federal de Santa Catarina
; Projeto: primeiro exemplo de programa??o assembler para PIC
; Autor: Roderval Marcelino
; Pisca Led com delay
;*******************************************************************************

    
#include <P16F877A.INC> 	; Arquivo de include do uC usado, no caso PIC16F877A

; Palavra de configura??o, desabilita e habilita algumas op??es internas
  __CONFIG  _CP_OFF & _CPD_OFF & _DEBUG_OFF & _LVP_OFF & _WRT_OFF & _BODEN_OFF & _PWRTE_OFF & _WDT_OFF & _XT_OSC

  
;***** defini??o de Vari?veis  *****************************
;cria vari?veis para o programa

  	cblock 0x20
		tempo0		
		tempo1			; Vari?veis usadas na rotina de delay.
		tempo2
		filtro
        					
	endc 
	
	
 ;******** Vetor de Reset do uC**************
 org 0x00		      ; Vetor de reset do uC.
 goto inicio		  ; Desvia para o inicio do programa.

;*************** Rotinas e Sub-Rotinas *****************************************
; Rotina de delay (De 1ms at? 256 ms)
delay_ms:
	    movlw   .4		; vai carrega tempo2 com constante  
	    movwf   tempo2	; carrega tempo2   
denovo2:movlw	.250	; vai carrega tempo1 com constante
	    movwf	tempo1	; Carrega tempo1 
denovo:	movlw	.250    ; vai carregar tempo0 com constante
	    movwf	tempo0	; Carrega tempo0 
volta:	nop			    ; gasta 1 ciclo de m?quina(1us para clock 4Mhz)
	    decfsz	tempo0,F; Fim de tempo0 ? (gasta 2 us)
	    goto	volta	; N?o - Volta (gasta 1us)
				        ; Sim - Passou-se 1ms. (4us x 250 = 1ms)
    	decfsz	tempo1,F; Fim de tempo1?
	    goto	denovo	; N?o - Volta 
				        ; Sim. 250 x 1ms = 250ms	
	    decfsz	tempo2,F; Fim de tempo2?
	    goto	denovo2	; N?o - Volta 
				        ; Sim. 4 x 250 = 1s				
 return   		    	; Retorna.

;****************** Inicio do programa *****************************************
inicio:
	clrf	PORTB		; Inicializa o Port B com zero
	clrf	PORTD		; Inicializa o Port D com zero

	banksel	TRISA		; Seleciona banco de mem?ria 1
	
	movlw	0x03
	movwf	TRISB		; Configura PortB como entrada
	
	movlw	0x00
	movwf	TRISD		; Configura PortD como sa?da
	
	
	
	movlw	0x00
	movwf	OPTION_REG	; Configura Op??es:
				; Pull-Up habilitados.
				; Interrup??o na borda de subida do sinal no pino B0.
				; Timer0 incrementado pelo oscilador interno.
				; Prescaler WDT 1:1.
				; Prescaler Timer0 1:2.
	banksel PORTA		; Seleciona banco de mem?ria 0.
	bsf	PORTD, 7

;*********************** Loop principal ****************************************
loop: 
    btfss   PORTB, 0		;Pula se 1
    goto teste2
    goto loop
    
teste2:
    btfsc   PORTB, 1		;Pula se 0
    goto    loop
    bsf	    PORTD, 6
    bcf	    PORTD, 7
    call    delay_ms
    bsf	    PORTD, 7
    bcf	    PORTD, 6
    goto loop
   
    end		



