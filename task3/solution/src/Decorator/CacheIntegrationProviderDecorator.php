<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:46
 */

namespace Task3\Decorator;


use Task3\Integration\IntegrationProviderInterface;
use Task3\Integration\IntegrationRequestParams;
use Task3\Integration\IntegrationResponse;
use Task3\Utils\Console;

/**
 * Декоратор для хранения кэша
 *
 * Class CacheIntegrationProviderDecorator
 * @package Task3\Decorator
 */
class CacheIntegrationProviderDecorator extends IntegrationProviderDecorator
{
	/**
	 * Должен быть объект для хранения кэша, пока массив фейк
	 * @var array
	 */
	private $cache;

	/**
	 * CacheIntegrationProviderDecorator constructor.
	 * @param IntegrationProviderInterface $integrationProvider
	 * @param array $cache фейк
	 */
	function __construct(IntegrationProviderInterface $integrationProvider, array $cache)
	{
		parent::__construct($integrationProvider);
		$this->cache = $cache;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getResponse(IntegrationRequestParams $requestParams): IntegrationResponse
	{
		$cacheKey = $this->getCacheKey($requestParams);
		// Проверяем есть ли свежий объект в Кэше, если нет то запрашиваем заново и кладем в кэш

		Console::writeLine("--Cache start");
		$response = parent::getResponse($requestParams);
		Console::writeLine("--Cache end");

		return $response;
	}

	/**
	 * Получение ключа кэша по параметрам
	 * @param IntegrationRequestParams $requestParams
	 * @return string
	 */
	private function getCacheKey(IntegrationRequestParams $requestParams)
	{
		return spl_object_hash($requestParams);
	}
}
