<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 20:19
 */

namespace Task3\Integration\Amo;

use Task3\Integration\IntegrationAccount;
use Task3\Integration\IntegrationProviderInterface;
use Task3\Integration\IntegrationRequestParams;
use Task3\Integration\IntegrationResponse;
use Task3\Utils\Console;

/**
 * Класс позволяет интегрироваться с API AmoCRM http://amocrm.ru
 *
 * Class AmoIntegrationProvider
 * @package Task3\Integration
 */
class AmoIntegrationProvider implements IntegrationProviderInterface
{
	/**
	 * Данные по аккаунту
	 * @var IntegrationAccount
	 */
	private $integrationAccount;

	function __construct(IntegrationAccount $integrationAccount)
	{
		$this->integrationAccount = $integrationAccount;
	}

	public function getResponse(IntegrationRequestParams $requestParams): IntegrationResponse
	{
		Console::writeLine("---Amo request start");
		Console::writeLine("---Amo request end");

		return new IntegrationResponse(200, [], null);
	}
}