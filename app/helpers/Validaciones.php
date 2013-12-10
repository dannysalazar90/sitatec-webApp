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
			//$tipoOrigen=esMovil(trim($num_origen));
			$operadorOrigen=Validaciones::buscarOperador(substr($linea, 0, 3));
			if($operadorOrigen==0 && strlen(trim($num_origen))==7){
				$operadorOrigen=1;
			}elseif(strlen(trim($num_origen))==10 && $operadorOrigen==0){
				$operadorOrigen=2;
			}else{
				$operadorOrigen=$operadorOrigen;
			}

			$num_destino=substr($linea, 10, 10);
			$operadorDestino=Validaciones::buscarOperador(substr($linea, 10, 3));
			if($operadorDestino==0 && strlen(trim($num_destino))==7){
				$operadorDestino=1;
			}elseif(strlen(trim($num_destino))==10 && $operadorOrigen==0){
				$operadorDestino=2;
			}else{
				$operadorDestino=$operadorDestino;
			}

			$hora_inicio=substr($linea, 20, 18);
			$hora_fin=substr($linea, 38, 18);
			$fecha=Validaciones::devolverFecha($hora_inicio);
			$duracion=Validaciones::calcularDuracion($hora_inicio, $hora_fin);

			$tarifa=Validaciones::calcularTarifa($operadorOrigen, $operadorDestino, $duracion, $hora_inicio);


			return $num_origen.$num_destino.$hora_inicio.$hora_fin.$duracion.$tarifa;
		}
		
	}

	public static function devolverFecha($hora){
		$anio=substr($hora, 0, 4);
		$mes=substr($hora, 5, 2);
		$dia=substr($hora, 8, 2);
		$respuesta=array(
			'anio' => $anio,
			'mes' => $mes,
			'dia' => $dia
			);
		return $respuesta;
	}

	public static function calcularTarifa($origen, $destino, $duracion, $hora){
		$subtotal=0;
		$tarifas=Tarifa::All();
		foreach ($tarifas as $tarifa) {
			if($tarifa->operator_origen=="".$origen && $tarifa->operator_destino=="".$destino){
				$subtotal=$tarifa->tarifa*$duracion;
				$total1=Validaciones::aplicarDescuentosFecha($subtotal, $origen, $hora);
				$total2=Validaciones::aplicarDescuentosDia($total1, $origen, $hora);
				$subtotal=$total2;
			}else{
				$subtotal=220*$duracion;
			}
		}
		return $subtotal;
	}

	public static function aplicarDescuentosDia($total, $operador, $hora){
		$dias=Dia::All();
		$diaBD=0;
		$diaArchivo=0;
		$superTotal=0;

		$fechaArchivo=Validaciones::devolverFecha($hora);
		$diaArchivo=Validaciones::diaSemana($fechaArchivo["anio"], $fechaArchivo["mes"], $fechaArchivo["dia"]);
		foreach ($dias as $dia) {
			if($dia->dia==$diaArchivo && $dia->operator_id==$operador){
				$descuento=($total*$dia->porcentaje)/100;
				$superTotal=$total-$descuento;
			}else{
				$superTotal=$total;
			}
		}
		return $superTotal;
	}

	public static function aplicarDescuentosFecha($total, $operador, $hora){
		$fechas=Fecha::All();
		$granTotal=0;
		$fechaArchivo=Validaciones::devolverFecha($hora);

		foreach ($fechas as $fecha) {
			$fechaBD=Validaciones::devolverFecha($fecha->fecha);
			if ($fechaBD["mes"]==$fechaArchivo["mes"] && $fechaBD["dia"]==$fechaArchivo["dia"] && $fecha->operator_id==$operador) {
				$descuento=($total*$fecha->porcentaje)/100;
				$granTotal=$total-$descuento;
			}else{
				$granTotal=$total;
			}
		}
		return $granTotal;
	}

	public static function buscarOperador($prefijo){
		//$rangos=Rango::All();
		$operadores=Operadore::All();
		$rango=Rango::where('range', '=', $prefijo)->first();
		if ($rango!=null) {
			foreach ($operadores as $operador) {
				if($rango->operator_id==$operador->id)
					return $operador->id;
			}
		}else{
			return 0;
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

	public static function diaSemana($ano,$mes,$dia)
	{
		// 0->domingo	 | 6->sabado
		$dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
			return $dia;
	}

}