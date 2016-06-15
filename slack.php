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

	
}