<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function buscar($valor){
        $categorias = array("AUDIFONOS", "ADAPTADOR", "ANTENA", "BATERIA",
        "BASCULA", "BOCINA", "BAFLE", "BINOCULARES", "BOLIGRAFO", "BOCINAS", "HOME",
        "CALCULADORA", "CARETA", "CAUTIN", "CABLE", "CAMARA", "CAJON", "CD", "CELULAR", "CAJA",
        "CHIP", "CHROMECAST", "CINTA", "CONTROL", "CONECTOR", "CONTACTO", "CORREA", "CORTADOR",
        "CPU", "CARGADOR", "CRISTAL", "CUTER", "CUBO", "CUBREBOCAS", "DISPENSADOR", "DESINFECTANTE",
        "DETECTOR", "DECODIFICADOR", "MINI", "DVD-R", "ENCENDEDOR", "EXTENSOR",
        "ELIMINADOR", "EXTENSION", "FOCO", "FOLDERS", "FUENTE", "FUNDA", "GABINETE", "GEL", "ARTICULOS",
        "HUMIDIFICADOR", "MULTIFUNCIONAL", "INVERSOR", "LAMPARA", "LECTOR", "LENTE", "LENTES", "MALETIN",
        "MOTHER BOARD", "MINICONCENTRADOR", "MEMORIA", "MICROFONO", "MOUSE", "MONITOR", "MOCHILA",
        "REPRODUCTOR", "LAPTOP", "PULSO", "PANTALLA", "PAPEL", "PILA", "PIZARRON", "PLUG", "PLUMA",
        "PRESENTADOR", "PROCESADOR", "PANEL", "PASTA", "PULSERA", "QUEMADOR", "RAQUETA", "RECEPTOR",
        "REGISTRADOR", "RACK", "ROKU", "ROLLO", "REGULADOR", "SOPORTE", "SILLA", "SOBRES",
        "SPRAY", "SMART", "SINTONIZADOR", "SWITCH", "TABLET", "TAPETE", "TONER", "TELESCOPIO", "TECLADO",
        "TERMOMETRO", "TELEFONO", "TRANSMISOR", "TIMBRE", "TOALLAS", "TRIPIE", "TARJETA", "VIDEO",
        "VENTILADOR", "WALKIE");

        if(in_array( (strtok($valor,' ')), $categorias)){
            return ucfirst(strtolower(strtok($valor,' ')));
        }else{
            if((strtok($valor,' '))=='AUDIF'||(strtok($valor,' '))=='AUDIF.'){
                return ucfirst(strtolower('AUDIFONOS'));
            }
            else if((strtok($valor,' '))=='ADAPT'){
                return ucfirst(strtolower('ADAPTADOR'));
            }
            else if((strtok($valor,' '))=='DISCO'){
                return ucfirst(strtolower('DISCO DURO'));
            }
            else if((strtok($valor,' '))=='AIRE'){
                return ucfirst(strtolower('AIRE COMPRIMIDO'));
            }
            else if((strtok($valor,' '))=='CALC.'){
                return ucfirst(strtolower('CALCULADORA'));
            }
            else if((strtok($valor,' '))=='BOTELLA'){
                return ucfirst(strtolower('BOTELLA DE TINTA'));
            }
            else if((strtok($valor,' '))=='CART.'){
                return ucfirst(strtolower('CARTUCHO DE TINTA'));
            }
            else if((strtok($valor,' '))=='MULTIFUNC'){
                return ucfirst(strtolower('MULTIFUNCIONAL'));
            }
            else if((strtok($valor,' '))=='MINICONCENTR'){
                return ucfirst(strtolower('MINICONCENTRADOR'));
            }
            else if((strtok($valor,' '))=='MICROF'){
                return ucfirst(strtolower('MICROFONO'));
            }
            else if((strtok($valor,' '))=='CARG.'||(strtok($valor,' '))=='CARG'){
                return ucfirst(strtolower('CARGADOR'));
            }
            else if((strtok($valor,' '))=='SOP.'||(strtok($valor,' '))=='SOP'){
                return ucfirst(strtolower('SOPORTE'));
            }
            else if((strtok($valor,' '))=='TIRA'){
                return ucfirst(strtolower('TIRA LED'));
            }
            else if((strtok($valor,' '))=='TECL'){
                return ucfirst(strtolower('TECLADO'));
            }
            else if((strtok($valor,' '))=='BARRA'){
                return ucfirst(strtolower('BARRA MULTICONTACTOS'));
            }
            else if((strtok($valor,' '))=='CONTR'){
                return ucfirst(strtolower('CONTROL'));
            }
            else{
                return 'undefined';
            }
        }
    }
}