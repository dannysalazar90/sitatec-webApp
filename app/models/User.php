<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array('username', 'email', 'password');

	public static function agregarUsuario($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
        $datos=array(
        			'username'=>$input['username'],
        			'email'=>$input['email'],
        			'password'=>Hash::make($input['password'])
        		);

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'username'  => array('required', 'min:3', 'max:50'),  
            'email' => array('required', 'email', 'min:6','max:100', 'unique:users'), 
            'password' => array('required', 'min:4', 'max:100')
        );
                
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{

            // en caso de cumplir las reglas se crea el objeto Vendedor
            $usuario = User::create($datos);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Usuario creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $usuario;
        }    
        
        return $respuesta; 
  }

  public static function editarUsuario($input){
        // función que recibe como parámetro la información del formulario para crear el Vendedor
  		$usuario=$input['username'];
        $email=$input['email'];
        $password=$input['password'];

        $respuesta = array();
        
        // Declaramos reglas para validar que el nombre y apellido sean obligatorios y de longitud maxima 100
        $reglas =  array(
            'username'  => array('required', 'min:3', 'max:50'),  
            'email' => array('required', 'email', 'min:6','max:100', 'unique:users')
        );
    
        $validator = Validator::make($input, $reglas);
        
        // verificamos que los datos cumplan la validación 
        if ($validator->fails()){
            
            // si no cumple las reglas se van a devolver los errores al controlador 
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{
            if(empty($password))
                
            // en caso de cumplir las reglas se crea el objeto Vendedor
            $usuario = User::create($datos);        
            
            // se retorna un mensaje de éxito al controlador
            $respuesta['mensaje'] = 'Usuario creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $usuario;
        }    
        
        return $respuesta; 
  }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}