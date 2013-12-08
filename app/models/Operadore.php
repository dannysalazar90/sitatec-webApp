<?php

class Operadore extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'operadores';

	protected $fillable = array('operator_name');

	public static function agregarOperador($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $name=array(
        			'operator_name'=>$input['operator_name']
        		);

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(  
            'operator_name' => array('required', 'min:3','max:100', 'unique:operadores'), 
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $operador = Operadore::create($input);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Operador creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $operador;
        }    
        
        return $respuesta; 
  }

  public static function editarOperador($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'operator_name'  => array('required', 'min:3', 'max:100', 'unique:operadores')
        );
    
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{
                
            // en caso de cumplir las reglas se crea el objeto Vendedor
            $operador=Operadore::find($input['operator_id']);
            $operador->operator_name=$input['operator_name'];
            $operador->save();
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Usuario Editado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $operador;
        }    
        
        return $respuesta; 
  }

  public static function eliminarOperador($id){
    $operador=Operadore::find($id);
    $operador->delete();
  }


	/**
	 * Get the unique identifier for the operator.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

}