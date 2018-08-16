<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:13
 */

namespace Task3\Integration;

/**
 * Ответ от сервера после запроса к сервису
 *
 * Class IntegrationResponse
 * @package Task3\Integration
 */
class IntegrationResponse
{
	/**
	 * Код ответа 200 | 404 | 500
	 * @var $statusCode int
	 */
	private $statusCode;

	/**
	 * Массив заголовков ответа
	 * @var $headers array
	 */
	private $headers;

	/**
	 * Тело ответа
	 * @var $content array
	 */
	private $content;

	/**
	 * IntegrationResponse constructor.
	 * @param int $statusCode Статус код
	 * @param array $headers Заголовки
	 * @param array $content Контент
	 */
	function __construct(int $statusCode, array $headers, ?array $content)
	{
		$this->statusCode = $statusCode;
		$this->headers = $headers;
		$this->content = $content;
	}

}