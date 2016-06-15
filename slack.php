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

	
}