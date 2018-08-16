<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:12
 */

namespace Task3\Integration;

/**
 * Интерфейс для провайдера, нужен при декорировании
 *
 * Interface IntegrationProviderInterface
 * @package Task3\Integration
 */
interface IntegrationProviderInterface
{
	public function getResponse(IntegrationRequestParams $requestParams) : IntegrationResponse;
}