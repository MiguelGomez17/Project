<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function buscar($valor){
        $categorias = array("AUDIFONOS", "ADAPTADOR", "ANTENA", "BATERIA",
        "BASCULA", "BAFLE", "BOCINAS", "CALCULADORA", "CARETA", "CABLE", "CAMARA", "CELULAR",
        "CHIP", "CHROMECAST", "CONTROL", "CPU", "CARGADOR",
        "CUBREBOCAS", "DISPENSADOR", "DESINFECTANTE",
        "DETECTOR", "DECODIFICADOR", "MINI", "ENCENDEDOR", "EXTENSOR",
        "ELIMINADOR", "EXTENSION", "FOCO", "FOLDERS", "FUENTE", "FUNDA", "GABINETE", "GEL",
        "HUMIDIFICADOR", "MULTIFUNCIONAL", "LAMPARA", "LECTOR", "LENTES", "MALETIN",
        "MINICONCENTRADOR", "MEMORIA", "MICROFONO", "MOUSE", "MONITOR", "MOCHILA",
        "REPRODUCTOR", "LAPTOP", "PULSO", "PANTALLA", "PILA", 
        "PRESENTADOR", "PROCESADOR", "PASTA", "QUEMADOR", "RECEPTOR",
        "RACK", "ROLLO", "REGULADOR", "SOPORTE", "SILLA",
        "SPRAY", "SMART", "SINTONIZADOR", "SWITCH", "TABLET", "TAPETE", "TONER", "TECLADO",
        "TERMOMETRO", "TELEFONO", "TRANSMISOR", "TOALLAS", "TRIPIE", "TARJETA",
        "VENTILADOR");

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
            else if((strtok($valor,' '))=='MINICONCENTR'||(strtok($valor,' '))=='MINICONCENTRADOR'){
                return ucfirst(strtolower('MINI'));
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
            else if((strtok($valor,' '))=='BOCINA'){
                return ucfirst(strtolower('BOCINAS'));
            }
            else if((strtok($valor,' '))=='CRISTAL'){
                return ucfirst(strtolower('CRISTAL TEMPLADO'));
            }
            else if((strtok($valor,' '))=='PAQ.'){
                return ucfirst(strtolower('CUBREBOCAS'));
            }
            else if((strtok($valor,' '))=='LENTE'){
                return ucfirst(strtolower('LENTES'));
            }
            else if((strtok($valor,' '))=='MOTHER'){
                return ucfirst(strtolower('MOTHER BOARDS'));
            }
            else if((strtok($valor,' '))=='PANEL'){
                return ucfirst(strtolower('PANEL SOLAR'));
            }
            else if((strtok($valor,' '))=='PASTA'){
                return ucfirst(strtolower('PASTA TERMICA'));
            }
            else if((strtok($valor,' '))=='VIDEO'){
                return ucfirst(strtolower('VIDEOCONSOLA'));
            }
            else{
                return 'undefined';
            }
        }
    }
}