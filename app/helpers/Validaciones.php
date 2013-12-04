<?php
 
class Validaciones
{
	public static function procesarLinea($linea){
		$num_origen;
		$num_destino;
		$hora_inicio;
		$hora_fin;
		$duracion;

		$linea=ltrim($linea);
		$linea=rtrim($linea);
		if (strlen($linea)!=56) {
			return "cadena invalida";
		} else {
			$num_origen=substr($linea, 0, 10);
			$num_destino=substr($linea, 10, 10);
			$hora_inicio=substr($linea, 20, 18);
			$hora_fin=substr($linea, 38, 18);
			$duracion=Validaciones::calcularDuracion($hora_inicio, $hora_fin);
			return "Origen:".$num_origen." Destino:".$num_destino." Hora Inicio:".$hora_inicio." Hora Fin:".$hora_fin." Duracion: ".$duracion." minutos";
		}
		
	}

	public static function calcularDuracion($horaInicio, $horaFin){
		$anioInicio=substr($horaInicio, 0, 4);
		$mesInicio=substr($horaInicio, 5, 2);
		$diaInicio=substr($horaInicio, 8, 2);
		$horInicio=substr($horaInicio, 10, 2);
		$minutoInicio=substr($horaInicio, 13, 2);
		$segundoInicio=substr($horaInicio, 16, 2);
		$inicio=$anioInicio."-".$mesInicio."-".$diaInicio." ".$horInicio.":".$minutoInicio.":".$segundoInicio;

		$anioFin=substr($horaFin, 0, 4);
		$mesFin=substr($horaFin, 5, 2);
		$diaFin=substr($horaFin, 8, 2);
		$horFin=substr($horaFin, 10, 2);
		$minutoFin=substr($horaFin, 13, 2);
		$segundoFin=substr($horaFin, 16, 2);
		$fin=$anioFin."-".$mesFin."-".$diaFin." ".$horFin.":".$minutoFin.":".$segundoFin;
		
		$segundos= strtotime($fin) - strtotime($inicio);
		$minutos=intval($segundos/60);

		return $minutos;
	}

}