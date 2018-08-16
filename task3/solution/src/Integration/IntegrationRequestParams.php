<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:21
 */

namespace Task3\Integration;

/**
 * Параметры для выполнения запроса
 *
 * Class IntegrationRequestParams
 * @package Task3\Integration
 */
class IntegrationRequestParams
{
	/**
	 * Часть после хоста, например, /leads/list
	 * @var string
	 */
	private $url;

	/**
	 * Метод запрос GET | POST | PUT | DELETE
	 * @var string
	 */
	private $method;

	/**
	 * Данные в теле запроса
	 * @var array
	 */
	private $data;

	/**
	 * Параметры в url ?from=10.10.2010&to=05.05.2015
	 * @var $queryParams array
	 */
	private $queryParams;

	/**
	 * IntegrationRequestParams constructor.
	 * @param string $url
	 * @param string $method
	 * @param array $queryParams
	 * @param array $data
	 */
	function __construct(string $url, string $method, array $queryParams, array $data)
	{
		$this->url = $url;
		$this->method = $method;
		$this->queryParams = $queryParams;
		$this->data = $data;
	}
}