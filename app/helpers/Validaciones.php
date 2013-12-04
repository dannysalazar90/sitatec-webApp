<?php
 
class Validaciones
{
	public static function procesarLinea($linea){
		$num_origen;
		$num_destino;
		$hora_inicio;
		$hora_fin;

		$linea=ltrim($linea);
		$linea=rtrim($linea);
		if (strlen($linea)!=56) {
			return "cadena invalida";
		} else {
			$num_origen=substr($linea, 0, 10);
			$num_destino=substr($linea, 10, 10);
			$hora_inicio=substr($linea, 20, 18);
			$hora_fin=substr($linea, 38, 18);
			return "Origen:".$num_origen." Destino:".$num_destino." Hora Inicio:".$hora_inicio." Hora Fin:".$hora_fin;
		}
		
	}
}