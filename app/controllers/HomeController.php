<?php

class HomeController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function getIndex(){
		return View::make('master');
	}

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$input = Input::all();
		$rules = array(
			'login'		=> 'required',
			'password'	=> 'required'
			);
		$v = Validator::make($input, $rules);

		if($v->fails()){
			return Redirect::to('login')->withErrors($v);
		}else{
			$credentials=array(
				'username'		=> $input['login'],
				'password'	=> $input['password']
				);
			if(Auth::attempt($credentials)){
				return Redirect::to('admin');
			}else{
				return Redirect::to('login');
			}
		}
	}

	public function getOperadores(){
		$operadores = Operadore::all();
		return View::make('operadores.index', array('operadores' => $operadores));
	}

	public function postOperadores(){
        
        // llamamos a la función de agregar vendedor en el modelo y le pasamos los datos del formulario 
        $respuesta = Operadore::agregarOperador(Input::all());
        
        // Dependiendo de la respuesta del modelo 
        // retornamos los mensajes de error con los datos viejos del formulario 
        // o un mensaje de éxito de la operación 
        if ($respuesta['error'] == true){
            return Redirect::to('operadores')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('operadores')->with('mensaje', $respuesta['mensaje']);
        }
    }

    public function getEditarOperador($id){
		$operador = Operadore::find($id);
		return View::make('operadores.editarOperador', array('operador' => $operador));
	}

	public function postEditarOperador(){
        
        // llamamos a la función de agregar vendedor en el modelo y le pasamos los datos del formulario 
        $respuesta = Operadore::editarOperador(Input::all());
        
        // Dependiendo de la respuesta del modelo 
        // retornamos los mensajes de error con los datos viejos del formulario 
        // o un mensaje de éxito de la operación 
        if ($respuesta['error'] == true){
            return Redirect::to('operadores')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('operadores')->with('mensaje', $respuesta['mensaje']);
        }
    }

    public function getEliminarOperador($id){
		$operador=Operadore::eliminarOperador($id);
		$operadores = Operadore::all();
		return View::make('operadores.index', array('operadores' => $operadores));
	}


	public function getUsuarios(){
		$usuarios = User::all();
		return View::make('usuarios.index', array('usuarios' => $usuarios));
	}

	public function postUsuarios(){
        
        // llamamos a la función de agregar vendedor en el modelo y le pasamos los datos del formulario 
        $respuesta = User::agregarUsuario(Input::all());
        
        // Dependiendo de la respuesta del modelo 
        // retornamos los mensajes de error con los datos viejos del formulario 
        // o un mensaje de éxito de la operación 
        if ($respuesta['error'] == true){
            return Redirect::to('usuarios')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('usuarios')->with('mensaje', $respuesta['mensaje']);
        }
    }

    public function getEditarUsuario($id){
		$usuario = User::find($id);
		return View::make('usuarios.editarUsuario', array('usuario' => $usuario));
	}

	public function postEditarUsuario($id){
		$usuarios = User::Find($id);
		return View::make('usuarios.editarUsuario', array('usuario' => $usuario));
	}

	public function getEliminarUsuario($id){
		$usuario=User::eliminarUsuario($id);
		$usuarios = User::all();
		return View::make('usuarios.index', array('usuarios' => $usuarios));
	}

	public function getRegister(){
		return View::make('register');
	}

	public function postRegister(){
		$input = Input::all();

		$rules = array(
			'username' 	=> 'required|unique:users',
			'email'		=> 'required|unique:users|email',
			'password'	=> 'required'
			);
		$v = Validator::make($input, $rules);

		if($v->passes()){
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}
		else{
			return Redirect::to('register')->withInput()->withErrors($v);
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
/*
	public function showWelcome()
	{
		return View::make('hello');
	}
*/
	public function getFile()
	{
		return View::make('files.index');
	}

	public function postFile()
	{
		$usuario=Auth::user()->username;
		$texto="";
		$linea="";
		$arch=Input::all();
		$nombre=date("Y-m-dG-i-s")."-".$usuario;
		$arch['fileUpload']->move('reports', $nombre);
		$file = fopen('reports/'.$nombre, "r") or exit("Unable to open file!");
			//Output a line of the file until the end is reached
			while(!feof($file))
			{
				$linea=fgets($file);
				$resultado=Validaciones::procesarLinea($linea);
				$texto=$texto.$resultado. "<br />";
			}
			fclose($file);
		return View::make('files.results',array('texto' => $texto));
	}

}