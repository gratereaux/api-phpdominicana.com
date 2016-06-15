<?php require 'vendor/autoload.php';

// Asignamos a nuestro namespace
namespace PHPdo;

// Clase con los metodos de Slack
class Slack{
	
	// Cliente de GuzzleHttp
	protected $client;
	// BASE Url del API de Slack
	protected $slack_url;
	// Data de Slack (como el token)
	protected $slack_data;
	// ID del canal público por defecto 
	protected $slack_channel = 'C1H92MSH5';
	// Metodos disponibles en el Slack
	protected $slack_methods = ['users.list', 'channels.list', 'chat.postMessage'];

	/**
	 * Constructor del Script
	 * @author Joel A. Jaime <joel.alexander.jaime@gmail.com> (https://posicioncreativa.com) */
	public function __construct(){
		// Cliente para hacer consultas
		$this->client 		= new GuzzleHttp\Client();
		// BASE Url del API de Slack
		$this->slack_url 	= 'https://slack.com/api/';
		// Data de Slack (como el token)
		$this->slack_data 	= ['token' => 'xoxp-39152444724-39167426673-41774226577-e7528d9d52'];
	}

	/**
	 * Metodo para generar una nueva consulta
	 * @param $method  	Tipo de metodo que usaremos (disponibles en $slack_methods)
	 * @param $type  	Tipo de consulta que se realizara (GET, POST, PUT, etc)
	 * @author Joel A. Jaime <joel.alexander.jaime@gmail.com> (https://posicioncreativa.com) */
	public function request($method, $type = 'POST'){
		// Validando si el parametro es válido
		if( in_array($method, $this->slack_methods) ){
			// Generamos los datos a pasar por la URL
			$parameters = http_build_query( $this->slack_data );
			// Unimos la URL con el token
			$request 	= implode( '?',[
				$this->slack_url . $method , $parameters
			]);
			// Generamos el request
			$response = $this->client->request($type, $request);
			// Retornamos cualquier respuesta
			return $response->getBody()->getContents();
		}
	}

	/**
	 * Metodo para obtener una lista con todos los usuarios del slack
	 * @author Joel A. Jaime <joel.alexander.jaime@gmail.com> (https://posicioncreativa.com) */
	public function get_users(){
		return $this->request('users.list', 'GET');
	}

	/**
	 * Metodo para obtener una lista con todos los canales disponibles
	 * @author Joel A. Jaime <joel.alexander.jaime@gmail.com> (https://posicioncreativa.com) */
	public function get_channels(){
		return $this->request('channels.list', 'GET');	
	}

	/**
	 * Metodo para enviar un mensaje a un canal por defecto
	 * @param $username  	Nombre de Usuario que usara en el chat
	 * @param $message  	Mensaje que el usuario quiere enviar al canal
	 * @author Joel A. Jaime <joel.alexander.jaime@gmail.com> (https://posicioncreativa.com) */
	public function send_message($username, $message){
		// Colocamos el canal público por defecto
		$this->slack_data['channel'] 	= $this->slack_channel;
		// Ingresamos el mensaje que deseamos enviar
		$this->slack_data['text']	 	= $message;
		// Asignamos un usuario inviato
		$this->slack_data['username']	= implode(' ', ['Invitado', '-', $username]);
		// Publicamos el mensaje en Slack!
		return $this->request('chat.postMessage', 'GET');
	}
	
}