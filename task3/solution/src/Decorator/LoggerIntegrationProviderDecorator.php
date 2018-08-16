<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 21:53
 */

namespace Task3\Decorator;


use Task3\Integration\IntegrationProviderInterface;
use Task3\Integration\IntegrationRequestParams;
use Task3\Integration\IntegrationResponse;
use Task3\Utils\Console;

/**
 * Декоратор для логирования
 *
 * Class LoggerIntegrationProviderDecorator
 * @package Task3\Decorator
 */
class LoggerIntegrationProviderDecorator extends IntegrationProviderDecorator
{
	/**
	 * Должен быть объект для Логирования, пока фейк
	 * @var array
	 */
	private $logger;

	/**
	 * LoggerIntegrationProviderDecorator constructor.
	 * @param IntegrationProviderInterface $integrationProvider
	 * @param array $logger фейк
	 */
	function __construct(IntegrationProviderInterface $integrationProvider, array $logger)
	{
		parent::__construct($integrationProvider);
		$this->logger = $logger;
	}

	public function getResponse(IntegrationRequestParams $requestParams): IntegrationResponse
	{
		try {
			Console::writeLine("-Log start");
			$response = parent::getResponse($requestParams);
			Console::writeLine("-Log end");
		}
		catch (\Exception $ex) { // Должен быть специальный класс
			// Логируем ошибку
			throw $ex;
		}

		return $response;
	}
}
