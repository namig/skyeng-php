<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:35
 */

namespace Task3\Integration;

/**
 * Данные по аккаунту сервиса, могут храниться в БД или конфиге
 *
 * Class IntegrationAccount
 * @package Task3\Integration
 */
class IntegrationAccount
{
	/**
	 * Хост, например общий http://api.amocrm.ru или конкретный url по данному клиенту
	 * @var string
	 */
	private $host;

	/**
	 * Логин пользователя
	 * @var string
	 */
	private $user;

	/**
	 * Пароль пользователя
	 * @var string
	 */
	private $password;

	/**
	 * IntegrationAccount constructor.
	 * @param string $host
	 * @param string $user
	 * @param string $password
	 */
	function __construct(string $host, string $user, string $password)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
	}
}