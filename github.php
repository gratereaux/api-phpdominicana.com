<?php namespace PHPdo;

require 'vendor/autoload.php';
use GuzzleHttp\Client;


/**
 * 	Clase con los metodos de Slack
 *	Por: Jose Gratereaux - http://www.josegratereaux.com
 */
class Github{
	//variable generales
	protected $github_url;
	protected $user;
	protected $github_methods = ["contributors", "repos"];

	/**
	 * Método constructor 
	 */
	public function __construct(){
		// Cliente para hacer consultas
		$this->client = new Client();
		$this->github_url = "https://api.github.com/";
		$this->user = "php-do"; //Usuario de github de PHP Dominicana
	}

	/**
	 * 
	 * @param $method 		Tipo de metodo que usaremos (disponibles en $github_methods)
	 * @param $repo 		Opcional, el repositorio a consultar en caso de necesitarlo		
	 * @param $type 		Opcional, Tipo de consulta que se realizara (GET, POST, PUT, etc)
	 */
	private function request($method, $repo = '', $type = 'GET'){
		// Validando si el parametro es válido
		if( in_array($method, $this->github_methods) ){
			// Generamos la URL segun el requerimiento
			if($method == "contributors"){
				$requestURL = $this->github_url . 'repos/' . $this->user . '/' . $repo . '/' . $method;
			}else if($method == "repos"){
				$requestURL = $this->github_url . 'users/' . $this->user . '/' . $method;
			}
			// Generamos el request
			$response = $this->client->request($type, $requestURL);
			// Retornamos cualquier respuesta
			return $response->getBody()->getContents();
		}
	}

	/**
	 * Mētodo para obtener todas las personas que contribuyen a una repo especifica
	 * @param $reponame		Nombre del repositorio a consultar 
	 */
	public function get_contributors($reponame){
		return $this->request('contributors', $reponame);
	}

	/**
	 * Mētodo para obtener todas las repos publicas
	 */
	public function get_repos(){
		return $this->request('repos');
	}

	/**
	 * Mētodo para obtener todos las repos publicas y la persona que contribuye en cada una de ellas
	 */
	public function get_all(){
		$allrepos = $this->request('repos');
		$array_repos = array();

		foreach (json_decode($allrepos) as $repo) {
			array_push($array_repos, [$repo->name => $this->get_contributors($repo->name)]);
		}
		return json_encode($array_repos);

	}
}