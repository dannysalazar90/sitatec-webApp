<?php

class Rango extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rangos';

    protected $fillable = array('range', 'operator_id');

    public static function agregarRango($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $datos=array(
                    'range'=>$input['range'],
                    'operator_id'=>$input['operator_list']
                );

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'range' => array('required', 'unique:rangos'), 
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $rango = Rango::create($datos);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Rango asignado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $rango;
        }    
        
        return $respuesta; 
  }

  public static function eliminarRango($id){
    $usuario=User::find($id);
    $usuario->delete();
  }
}