<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function buscar($valor){
        $identificador = strtok($valor,' ');
        
        switch($identificador){
            /* COMPUTACION */
            case 'CPU':
                return ('COE');
            case 'LAPTOP':
                return ('LAP');
            case 'TABLET':
                return ('TAB');
            case 'CELULAR':
                return ('CEL');
            //COMPUTADORAS ALLINONE, SISTEMA PUNTO DE VENTA

            /* HARDWARE */
            case 'DISCO':
                return ('ALM');
            //DISIPADORES Y VENTILADORES
            case 'ESCANER':
                return ('ESC');
            case 'FUENTE':
                return ('FPP');
            case 'GABINETE':
                return ('GAM');
            case 'IMPRESORA':
            case 'MULTIFUNCIONAL':
            case 'MULTIFUNC':
                return ('IMP');
            case 'MEMORIA':
                if((str_contains($valor, 'PARA')))
                    return ('MEC');
                else
                    return('MEM');
            case 'MONITOR':
                return ('MON');
            case 'PROCESADOR':
                return ('PRO');
            //SISTEMA DE ENFRIAMIENTO LIQUIDO
            //TARJETAS ACELERADORAS DE VIDEO
            //TARJETAS MADRE
            //ADAPTADORES Y ACCESORIOS WIFI
            //UNINDADES CD/DVD EXTERNAS
            //
            case 'UNIDAD':
                return ('ALM');

            /* ACCESORIOS DE COMPUTO */
            case 'ADAPT':
            case 'ADAPTADOR':
                if((str_contains($valor, 'RED')))
                    return ('CNT');
                else
                    return ('ADA');
            case 'BOCINA':
            case 'HOME':
                return ('BOC');
            //CAJONES
            case 'CAMARA':
                if((str_contains($valor,'WEB')))
                    return('CAW');
                elseif((str_contains($valor,'VIGILANCIA')))
                    return('SIV');
                else
                    return('CAD');
            case 'CARGADOR':
            case 'CARG':
                if((str_contains($valor,'LAPTOP'))||(str_contains($valor,'LAP'))||(str_contains($valor,'MINILAP')))
                    return('CRL');
                elseif((str_contains($valor,'CELULAR')))
                    return('CRC');
                else
                    return('NAN');
            case 'CONTROL':
                if((str_contains($valor,'JUEGOS')))
                    return('CJP');
                else
                    return('COR');
            case 'LECTOR':
                if((str_contains($valor,'BARRAS')))
                    return('LCB');
                elseif((str_contains($valor,'MEMORIAS')))
                    return('420');
                else
                    return('NAN');
            case 'MICROFONO':
                return('MIC');
            case 'MOUSE':
                if((str_contains($valor,'GAMER')))
                    return('MUG');
                else
                    return('MOU');
            case 'REGULADOR':
                return ('ENE');
            case 'TECLADO':
                return('TEC');
            /* ACCESORIOS DIVERSOS */
            case 'ANTENA':
                return 'ANT';            
            case 'AUDIFONOS':
            case 'AUDIF':
            case 'AUDIF.':
                if (str_contains($valor, 'GAMER'))
                    return ('ADG');
                elseif(str_contains($valor, 'CHICH'))
                    return ('AUC');
                else 
                    return ('AUD');
            case 'BARRA':
                return 'BAM';
            case 'BASE':
                return 'BAE';
            case 'BATERIA':
                if((str_contains($valor,'PORTATIL')))
                    return ('BAP');
                else
                    return ('NAN');
            case 'CONTROL':
                if((str_contains($valor,'JUEGOS')))
                    return ('CJP');
                else 
                    return ('COR');
            case 'RACK':
                return ('CSD');
            case 'CRISTAL':
                return ('CRT');
            //Detector de billetes falso
            case 'DISPENSADOR':
                return ('DAA');
            case 'ELIMINADOR':
                return ('ELU');
            case 'FUNDA':
            case 'MALETIN':
            case 'MOCHILA':
                return ('FUN');
            case 'HUMIDIFICADOR':
                return('HUA');
            case 'LAMPARA':
                if((str_contains($valor,'MOSQUITOS')))
                    return ('LAM');
                if((str_contains($valor,'EMERGENCIA')))
                    return ('905');
                if((str_contains($valor,'ESCRITORIO')))
                    return ('LES');
                if((str_contains($valor,'ASPAS')))
                    return ('LAS');
                if((str_contains($valor,'MINERO')))
                    return ('LMI');
                if((str_contains($valor,'CAMPING')))
                    return ('LCA');
                if((str_contains($valor,'SOLAR')))
                    return ('LPS');
                if((str_contains($valor,'PANEL')))
                    return ('LPA');
                if((str_contains($valor,'BICI'))||(str_contains($valor,'BICICL'))||(str_contains($valor,'BICICLETA')))
                    return ('LBI');
                if((str_contains($valor,'BARRA')))
                    return ('LBA');
                if((str_contains($valor,'RECARGABLE')))
                    return ('LLI');
                else 
                    return ('NAN');
            case 'LENTES':
                return ('LRV');
            //Localizador bluetooth
            //Mesas de plastico plegable
            case 'MINI':
                if((str_contains($valor,'USB')))
                    return ('HUB');
                elseif((str_contains($valor,'TECLADO')))
                    return ('TEC');
                else
                    return ('NAN');
            case 'MINICONCENTR':
            case 'MINICONCENTRADOR':
                return ('HUB');
            case 'PANEL':
                return ('PAS');
            //Pantallas de proyeccion
            case 'PILA':
            case 'PILAS':
                return ('PIL');
            case 'RAQUETA':
                return ('RAM');
            case 'RECEPTOR':
                return ('REB');
            case 'SELFIE':
                return ('SES');
            case 'RECEPTOR':
                return ('REB');
            case 'SOPORTE':
                return ('SOP');
            case 'TAPETE':
                return ('MOP');
            case 'TRIPIE':
                return ('TRI');
            /* ELECTRONICA Y GADGETS */
            /* GAMING */
            /* CABLES Y ADAPTADORES */
            /* CONSUMIBLES */
            /* ILUMINACION LED */
            /* REFACCIONES */
            /* LIMPIEZA Y MANTENIMIENTO */
            /* SOFTWARE */
            /* SALUD */
                
            default:
                return ('NAN');
        }

        /* HARDWARE *//*
        else if(($identificador)=='ADAPT'||($identificador)=='ADAPTADOR'){
            return ('ADA');
        }
        else if(($identificador)=='DISCO'){
                return ('ALM');
            }
            else if(($identificador)=='AIRE'){
                return ('AIC');
            }
            else if(($identificador)=='CALC.'){
                return ('CAL');
            }
            else if(($identificador)=='BOTELLA'){
                return ('CBT');
            }
            else if(($identificador)=='CART.'){
                return ('CBT');
            }
            else if(($identificador)=='MULTIFUNC'){
                return ('IMP');
            }
            else if(($identificador)=='MINICONCENTR'||($identificador)=='MINICONCENTRADOR'){
                return ('HUB');
            }
            else if(($identificador)=='MICROF'){
                return ('MIC');
            }
            else if(($identificador)=='CARG.'||($identificador)=='CARG'){
                return ('CARGADOR');
            }
            else if(($identificador)=='SOP.'||($identificador)=='SOP'){
                return ('SOPORTE');
            }
            else if(($identificador)=='TIRA'){
                return ('TIRA LED');
            }
            else if(($identificador)=='TECL'){
                return ('TECLADO');
            }
            else if(($identificador)=='BARRA'){
                return ('BARRA MULTICONTACTOS');
            }
            else if(($identificador)=='CONTR'){
                return ('CONTROL');
            }
            else if(($identificador)=='BOCINA'){
                return ('BOCINAS');
            }
            else if(($identificador)=='CRISTAL'){
                return ('CRISTAL TEMPLADO');
            }
            else if(($identificador)=='PAQ.'){
                return ('CUBREBOCAS');
            }
            else if(($identificador)=='LENTE'){
                return ('LENTES');
            }
            else if(($identificador)=='MOTHER'){
                return ('MOTHER BOARDS');
            }
            else if(($identificador)=='PANEL'){
                return ('PANEL SOLAR');
            }
            else if(($identificador)=='PASTA'){
                return ('PASTA TERMICA');
            }
            else if(($identificador)=='VIDEO'){
                return ('VIDEOCONSOLA');
            }
            else{
                return ($identificador);
            }*/
    }
}