<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CifradoCesarController extends Controller
{
    public function cifrar(Request $request){
        $texto=$request->input('texto');
        $desplazamiento = $request->input('desplazamiento');
        $idioma = $request->input('idioma');
        //LLamar la funcion
        $resultado = $this->cifradoCesar($texto, $desplazamiento, $idioma);

        return response()->json(['resultado' => $resultado]);

    }

    public function cifradoCesar($texto, $desplazamiento, $idioma)
    {
        $alfabeto = $idioma === 'spanish' ? 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ' : 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $texto = strtoupper($texto);
        $resultado = '';

        foreach (str_split($texto) as $letra) {
            if (strpos($alfabeto, $letra) !== false) {
                $indice = (strpos($alfabeto, $letra) + $desplazamiento) % strlen($alfabeto);
                $resultado .= $alfabeto[$indice];
            } else {
                $resultado .= $letra;
            }
        }

        return $resultado;
    }

    //Funcion de desifrado
    public function desifrar(Request $request)
    {
        $texto = $request->input('texto');
        $desplazamiento = $request->input('desplazamiento');
        $idioma = $request->input('idioma');

        $alfabeto = $idioma === 'spanish' ? 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ' : 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $desplazamiento = strlen($alfabeto) - $desplazamiento;

        $resultado = $this->cifradoCesar($texto, $desplazamiento, $idioma);
        return response()->json(['resultado' => $resultado]);
    }
}



?>
