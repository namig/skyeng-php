<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:32
 */

namespace Task3\Decorator;


use Task3\Integration\IntegrationProviderInterface;
use Task3\Integration\IntegrationRequestParams;
use Task3\Integration\IntegrationResponse;

/**
 * Базовый класс декоратора для создания обертки вокруг IntegrationProvider
 *
 * Class IntegrationProviderDecorator
 * @package Task3\Decorator
 */
class IntegrationProviderDecorator implements IntegrationProviderInterface
{
	/**
	 * Внутренний провайдер (амо) или декоратор (кэш/логер)
	 * @var $innerProvider IntegrationProviderInterface
	 */
	protected $innerIntegrationProvider;


	/**
	 * IntegrationProviderDecorator constructor.
	 * @param IntegrationProviderInterface $integrationProvider
	 */
	function __construct(IntegrationProviderInterface $integrationProvider)
	{
		$this->innerIntegrationProvider = $integrationProvider;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getResponse(IntegrationRequestParams $requestParams): IntegrationResponse
	{
		return $this->innerIntegrationProvider->getResponse($requestParams);
	}

}