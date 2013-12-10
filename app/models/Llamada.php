<?php

class Llamada extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'llamadas';

    protected $fillable = array('numero_origen', 'numero_destino', 'fecha_inicio', 'fecha_fin', 'duracion', 'precio');

    public static function agregarLlamada($linea){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $num_origen=substr($linea, 0, 10);
        $num_destino=substr($linea, 10, 10);
        $hora_inicio=substr($linea, 20, 20);
        $hora_fin=substr($linea, 40, 20);
        $duracion=trim(substr($linea, 60, 10));
        $precio=trim(substr($linea, 70, 10));

        $datos=array(
                    'numero_origen'=>$num_origen,
                    'numero_destino'=>$num_destino,
                    'fecha_inicio'=>$hora_inicio,
                    'fecha_fin'=>$hora_fin,
                    'duracion'=>$duracion,
                    'precio'=>$precio
                );

        Llamada::create($datos);        
  }
}