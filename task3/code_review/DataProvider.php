<?php

// TODO: В обоих классах желательно бы документация phpDoc, также можно добавить строгую типизацию

// TODO: src не должно быть в неймспейсе, должен быть, например, vendor и название проекта (SkyEng\Task3\Integration).
namespace src\Integration;

class DataProvider // TODO: непонятно какой конкретно сервис
{
	// TODO: нужно объединить эти параметры в объект, т.к. они могут модифицироваться
	private $host;
	private $user;
	private $password;

	/**
	 * @param $host
	 * @param $user
	 * @param $password
	 */
	public function __construct($host, $user, $password) // TODO: параметры должны быть объектом
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
	}

	/**
	 * @param array $request
	 *
	 * @return array
	 */
	// TODO: название метода не информативно, лучше getResponse
	public function get(array $request) // TODO: это еще не запрос, скорее это параметры запроса, лучше $requestParams
	{
		// returns a response from external service
	}
}
