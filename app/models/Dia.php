<?php

class Dia extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dias';

    protected $fillable = array('dia', 'porcentaje', 'operator_id', 'name');

    public static function agregarDia($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $datos=array(
                    'name'=>$input['name'],
                    'dia'=>$input['dia'],
                    'porcentaje'=>$input['porcentaje'],
                    'operator_id'=>$input['operator_list']
                );

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'dia' => array('required')
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $dia = Dia::create($datos);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Dia Especial Creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $dia;
        }    
        
        return $respuesta; 
  }

}