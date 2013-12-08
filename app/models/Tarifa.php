<?php

class Tarifa extends Eloquent{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tarifas';

    protected $fillable = array('tarifa', 'operator_origen', 'operator_destino');

    public static function agregarTarifa($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $datos=array(
                    'tarifa'=>$input['tarifa'],
                    'operator_origen'=>$input['operator_list_origen'],
                    'operator_destino'=>$input['operator_list_destino']
                );

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'tarifa' => array('required')
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $tarifa = Tarifa::create($datos);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Tarifa Creada!';
            $respuesta['error']   = false;
            $respuesta['data']    = $tarifa;
        }    
        
        return $respuesta; 
  }

  public static function eliminarRango($id){
    $usuario=User::find($id);
    $usuario->delete();
  }
}