<?php
/**
 * Created by PhpStorm.
 * User: namig
 * Date: 16.08.2018
 * Time: 21:06
 */

namespace Task3;

use Task3\Decorator\CacheIntegrationProviderDecorator;
use Task3\Decorator\LoggerIntegrationProviderDecorator;
use Task3\Integration\Amo\AmoIntegrationProvider;
use Task3\Integration\IntegrationAccount;
use Task3\Integration\IntegrationRequestParams;

class App
{
	public function run()
	{
		$account = new IntegrationAccount('http://test.amocrm.ru','test','password');
		$requestParams = new IntegrationRequestParams('/leads/list', 'GET', ['from' => '05.05.2018'], []);

		$amoIntegrationProvider = new AmoIntegrationProvider($account);
		$cacheDecorator = new CacheIntegrationProviderDecorator($amoIntegrationProvider, []);
		$loggerDecorator = new LoggerIntegrationProviderDecorator($cacheDecorator, []);

		$response = $loggerDecorator->getResponse($requestParams);
	}
}