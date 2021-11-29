<?php
 include_once("class.OperacionesMatematicas.php");

class AlertaDeAuxilio{
    var  $satelite1;
    var  $satelite2;
    var  $satelite3;
    
    var  $mensaje_recibido;
    
    function AlertaDeAuxilio(){
        $this->satelite1   =   array(   'nombre'=>'KENOBI', 
                                        'posicion'=>array('x'=>-500,'y'=>-200), 
                                        'distancia_al_emisor'=>'', 
                                        'mensaje_del_emisor'=>array());
        $this->satelite2   =   array(   'nombre' =>'SKYWALKER', 
                                        'posicion'=>array('x'=>100,'y'=>-100), 
                                        'distancia_al_emisor'=>'', 
                                        'mensaje_del_emisor'=>array());
        $this->satelite3   =   array(   'nombre'=>'SATO', 
                                        'posicion'=>array('x'=>500,'y'=>100), 
                                        'distancia_al_emisor'=>'', 
                                        'mensaje_del_emisor'=>array());
    }

    // *********************** CODIGO DE RESOLUCION **************************
    function  getMensajeDelEmisor(){
        $msg1 = $this->satelite1['mensaje_del_emisor']; 
        $msg2 = $this->satelite2['mensaje_del_emisor'];
        $msg3 = $this->satelite3['mensaje_del_emisor'];
        
        $resul1= $this->comparaDosMensajes($msg1, $msg2);
        $resul2= $this->comparaDosMensajes($resul1, $msg3);
        
        $mensaje_recibido=array();
        for($i=0;$i<count($resul2);$i++){
            array_push($mensaje_recibido,$resul2[$i]." ");
        }
        
        //transformo el array en string 
        $this->mensaje_recibido= implode($mensaje_recibido);
        echo 'Mensaje decodificado: <br>==>'.$this->mensaje_recibido.'<br> ';
    }
    
    function comparaDosMensajes($msg1, $msg2){
      //Ubico el mensaje mas largo primero
      if(count($msg1)>count($msg2)){
          $array1 = $msg1; $array2= $msg2;
      } else {
           $array1 = $msg2; $array2= $msg1;
      }
      //actualizo los elementos de A2 para que tga igual long que A1
      while(count($array2) < count($array1))
        array_push($array2,"");
      
      //echo '--> un array: '; print_r($array1);echo '<br>';
      //echo '--> un array: '; print_r($array2);echo '<br>';
      
      $msg_ok = array();
      //empiezo a comparar y crear un array resultante
      for($i=0; $i<count($array1); $i++){
          //1.consideraciones para el primer elemento del array
          if($i==0){ 
                if($array1[$i]==""){
                    //si el A1 es vacio no importa el contenido de A2. Directamente agrego su valor (vacio o no)
                    array_push($msg_ok, $array2[$i]); 
                }else{
                     array_push($msg_ok, $array1[$i]);
                }
          }
          else{ //consideraciones para el resto del array
        //2.comparo los demas elementos   
            if($array1[$i]==""){
                //si el A1 es vacio no importa el contenido de A2. Directamente agrego su valor (vacio o no)
                array_push($msg_ok, $array2[$i]); 
             }
             else{ //A1 tiene contenido, averiguo que pasa en A2
                  if($array2[$i]==""){
                      array_push($msg_ok, $array1[$i]); //si A2 es vacio, agrego A1
                  }else{ //si A2 tambien tiene valor tengo que comparar: A1 con el anterior a A2
                      if(($array2[$i-1]=="") or ($array1[$i]==$array2[$i-1])){
                          //si el valor anterior de A2 es vacio o es igual al de A1 el orden es A1, A2
                          array_push($msg_ok, $array1[$i], $array2[$i]);
                      }else{
                          //sino, el orden es inverso
                          array_push($msg_ok, $array2[$i], $array1[$i]);
                      } 
                  }
            }
          }//cierra else punto 2
      }//cierra for
       //echo '--> el resultado con repetidos es: '; print_r($msg_ok);echo '<br>';
      
       // Debo eliminar las palabras repetidas del array resultante
       $final= array(); $i=0;
       for($x= 0; $x < count($msg_ok); $x++){
            if(($x+1) < count($msg_ok)){
                if($msg_ok[$x] != $msg_ok[$x+1]){
                    $final[$i]=$msg_ok[$x];
                    $i++;
                }
            } else {
                if($msg_ok[$x] != $final[$i-1] )
                    $final[$i]= $msg_ok[$x];
            }  
        }
        
        //var_dump($final); echo '<br>';
        return $final;
        
    }
    
    
    function getLocalizacionDelEmisor(){
        echo '<br>Analizando posibles coordenadas:';
       
        $a= $this->satelite1['distancia_al_emisor'];
        $b= $this->satelite2['distancia_al_emisor'];
        $c= $this->satelite3['distancia_al_emisor'];
        echo '<br>D1='.$a.' D2='.$b.' D3='.$c;
        $p = new OperacionesMatematicas($a, $b, $c);

        $resultado1 = $p->ecuacion1($a, $b, $c);
        echo '<br/>valor posible x1: '. $resultado1[0].'<br/>';
        echo 'valor posible x2: '. $resultado1[1];


        $resultado2 = $p->ecuacion2($a, $b, $c);
        echo '<br/>valor posible x1: '. $resultado2[0].'<br/>';
        echo 'valor posible x2: '. $resultado2[1];


        $resultado3 = $p->ecuacion3($a, $b, $c);
        echo '<br/>valor posible x1: '. $resultado3[0].'<br/>';
        echo 'valor posible x2: '. $resultado3[1];
    }
    
    
    
    
         
    //************************  CODIGO DE CONEXION ****************************   
     function completoSatelite( $nombre,  $distancia, $mensaje){
    
         if($this->satelite1['nombre'] == strtoupper($nombre)){
            $this->satelite1['distancia_al_emisor'] = $distancia;
            $this->satelite1['mensaje_del_emisor']  =  $mensaje;
        }else{    
                if($this->satelite2['nombre'] == strtoupper($nombre)){ 
                    $this->satelite2['distancia_al_emisor'] = $distancia;
                    $this->satelite2['mensaje_del_emisor']  =  $mensaje;
                } 
                else {
                    if($this->satelite3['nombre'] == strtoupper($nombre)){ 
                        $this->satelite3['distancia_al_emisor'] = $distancia;
                        $this->satelite3['mensaje_del_emisor']  =  $mensaje;
                        }    
                }  
        }
        
       
    } 

    function getAlerta(){
        $this->url = "http://localhost:3000/satellites"; //url del archivo a leer
        $json = json_decode(file_get_contents($this->url), true); //transforma la respuesta json en array php
        //print_r($json);
        
       
        foreach ($json as $value) {
            $this->completoSatelite($value['name'], $value['distance'], $value['message']);
        }
        
        
    }
    
    function imprimirInfo(){
        print_r($this->satelite1); echo '<br>';
        print_r($this->satelite2); echo '<br>';
        print_r($this->satelite3); echo '<br>';
    }
    
}
