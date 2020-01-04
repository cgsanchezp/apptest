<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	  function validar_raiz_perfecta($x) 
		{  
		    $sr = sqrt($x); 		      
		    return (($sr - floor($sr)) == 0); 
		}

  
	public function matriz(Request $request)
	{
		if ($request->isMethod('post')) {
			
		$numeros = $request->data;


		$cantnumeros = count($numeros);
		$nrofilascolumnas= sqrt($cantnumeros);

		if ($this->validar_raiz_perfecta($cantnumeros)) {
			
			$contador = 0;
			$porcion = array();
			$cuadrado = array();

			for ($i=0; $i < $cantnumeros ; $i++) { 
				array_push($porcion,$numeros[$i]);
				
				$contador = $contador + 1 ; 
				if ($contador === intval($nrofilascolumnas)) {
					array_push($cuadrado,$porcion);					
					$porcion = array();
					$contador = 0;
				}				
		
			}

			echo 'Matriz ingresada: <br/>';
			print_r($cuadrado);
			echo '<br/>Rotacion de la nueva matriz: <br/>';

  			array_push($cuadrado, array_shift($cuadrado));
  			print_r($cuadrado); 

			
			}else{
				print_r("No se puede imprimir,los numeros no forman un cuadrado");
			}

		}
		

	}

}
