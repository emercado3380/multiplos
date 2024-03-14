<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class MultiplosController extends Controller
{

    /**
    * Codigo validado con el Standar PSR-1
    * https://phptools.online/php-checker Choose a analyser or fixer and select PSR-1
    * Autor: Enrique Mercado Estrada
    * Email: emercado3380@gmail.com
    * Tel: 5539053835
    */


    public function index()
    {
        return view("numero");
    }

    public function procesar(Request $request)
    {
        /**
         * @param string $numero_final Numero natural N  de un rango que comprende de 0 a N
         * @var int $inicio
         * @var int $fin
         * @var int $i
         * @var string $color
         * @return array $data
         */

        $data = [];
        $inicio = 0;

        $fin = (int) $request->input('numero_final');


        for($i = $inicio; $i <= $fin ; $i ++){

            $res = $this->getMultiplo($i);

            if (!empty($res)) {

                $color = $this->getColor($res);

                $data[] = [
                    "numero" => $i,
                    "color" => $color,
                    "multiplos" => $res
                ];

                // Guardamos en la base de datos //

                $post = new Posts();
                $post->numero = $i;
                $post->multiplos = implode(",", $res);
                $post->save();
            }
        }




        return view('resultado',["data"=>$data]);
    }


    private function getMultiplo(int $numero) :array
    {
        /**
         * Dado un numero natural N ($numero) encuentra si dicho numero es multiplo
         * de 3, 5 o 7 y retorna un array  con los correspondientes multiplos,
         *
         * Dado que el número 0 solamente tiene un múltiplo que es el 0. Y los demás números naturales
         * tienen infinito número de múltiplos y el número 0 es múltiplo de todos los números es omitido
         *
         * @param string $numerol Numero natural
         * @return array $multiplos
         */

        $multiplos = [];

        if ($numero > 0) {
            if ($numero % 3 == 0) {
                $multiplos[] = 3;
            }
            if ($numero % 5 == 0) {
                $multiplos[] = 5;
            }
            if ($numero % 7 == 0) {
                $multiplos[] = 7;
            }
        }
        return $multiplos;
    }

    private function getColor(array $multiplos): string
    {
        /**
         * Dado un array de numeros naturales ("multiplos") cuyos valores solo pueden ser
         * 3, 5 o 7 se busca el valor minimo de dicho array y se le asigna un color (string),
         *
         * @param array $multiplos array de numeros naturales (multiplos)
         * @return string $color string en formato hexadecimal
         */

        $color = "";
        $multiplo = min($multiplos);

        if($multiplo == 3){
            $color = "#00FF00";
        }else if($multiplo == 5){
            $color = "#FF0000";
        }else if($multiplo == 7){
            $color = "#0000FF";
        }else {
            $color = "#000000";
        }

        return $color;

    }
}
