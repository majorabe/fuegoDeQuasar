<?php

class OperacionesMatematicas{
    //put your code here

    private $a;
    private $b;
    private $c;
    
    function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    public function getA() {
        return $this->a;
    }

    public function getB() {
        return $this->b;
    }

    public function getC() {
        return $this->c;
    }

    public function setA($a) {
        $this->a = $a;
    }

    public function setB($b) {
        $this->b = $b;
    }

    public function setC($c) {
        $this->c = $c;
    }

    public function cuadratica() {
        
	$d = $this->b*$this->b -4*$this->a*$this->c;
	$e = 2*$this->a;
	if ($d==0) {
	$cuadratica[0] = -$this->b/$e;
	$cuadratica[1] = $cuadratica[0];	
	}
	else {
		if ($d>0) {
		$cuadratica[0] = (-$this->b + sqrt($d))/$e;
		$cuadratica[1] = (-$this->b - sqrt($d))/$e;
		}
		else {
		$cuadratica[0] = NAN;
		$cuadratica[1] = NAN;
		}
	}    
		return $cuadratica;
    }
    
    public function ecuacion1($a, $b, $c){
        echo '<br>Ecuacion 1:';
        $var1 = -1 * pow($a,4) + 2 * pow($a,2) * pow($b,2) + 740000 * pow($a,2) -  pow($b,4) + 740000 *  pow($b,2) - 136900000000;
       // echo 'var 1= '.$var1;
        
        $var2=  -3700 * ((-3 * pow($a,2) + 3 * pow($b,2))/1850 + 400); 
        //echo 'var 2= '.$var2;
        
        if($var1 >=0){
            $x_resultado[0] = ($var2 + sqrt($var1))/7400;
            $x_resultado[1] = ($var2 - sqrt($var1))/7400;
        
       } else {
           $x_resultado[0]= NAN;
           $x_resultado[1]=  NAN;      
       }  
        return $x_resultado; 
    }
    
    
    public function ecuacion3($a, $b, $c){
        echo '<br>Ecuacion 3:';
        $var1 = -1 * pow($b,4) + 2 * pow($b,2) * pow($c,2) + 400000 * pow($b,2) -  1 * pow($c,4) + 400000 *  pow($c,2) - 40000000000;
        //echo 'var 1= '.$var1;
                
        $var2=  -1000 * (((-1 * pow($b,2) + pow($c,2))/500) - 600); 
        //echo 'var 2= '.$var2;
        
        if($var1 >=0){
            $x_resultado[0] = ($var2 + sqrt($var1))/2000;
            $x_resultado[1] = ($var2 - sqrt($var1))/2000;
        
       } else {
           $x_resultado[0]= NAN;
           $x_resultado[1]=  NAN;      
       }  
        return $x_resultado; 
    }
    
    
    public function ecuacion2($a, $b, $c){
        echo '<br>Ecuacion 2:';
        $var1 = -9 * pow($a,4) + 18 * pow($a,2) * pow($c,2) + 19620000 * pow($a,2) -  9 * pow($c,4) + 19620000 *  pow($c,2) - 1.06929E-13;
        //echo 'var 1= '.$var1;
        
        $var2=  -10 * ( -1 * pow($a,2) +  pow($c,2)); 
        //echo 'var 2= '.$var2;
        
        if($var1 >=0){
            $x_resultado[0] = ($var2 + sqrt($var1))/21800;
            $x_resultado[1] = ($var2 - sqrt($var1))/21800;
            
            //calculo sus y
          /*  echo '<br>Para las 2 x halladas:¿ usando la misma funcion de y <br>';
            $y1_resultado [0]= sqrt(pow($a,2) - pow($x_resultado[0] - (-500),2))-200; 
            echo '<br>$y1_resultado [0]: '. $y1_resultado[0];
            $y1_resultado [1]= sqrt(pow($a,2) - pow($x_resultado[1] - (-500),2))-200; 
            echo '<br>$y1_resultado [1]: '. $y1_resultado[1];
            
            
             $y2_resultado [0]= sqrt(pow($c,2) - pow($x_resultado[0] - 500,2)) + 100;
             echo '<br>$y2_resultado [0]: '. $y2_resultado[0];
             $y2_resultado [1]= sqrt(pow($c,2) - pow($x_resultado[1] - 500,2)) + 100;
             echo '<br>$y2_resultado [1]: '. $y2_resultado[1];
             */
       } else {
           $x_resultado[0]= NAN;
           $x_resultado[1]=  NAN;      
       }  
        return $x_resultado; 
    }
}

