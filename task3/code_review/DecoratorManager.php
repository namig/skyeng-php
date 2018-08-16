<?php

/**
	Задание: Проведите Code Review. Необходимо написать, с чем вы не согласны и почему.

	Дополнительное задание: Напишите свой вариант.
	Решение должно быть представлено в виде ссылки на https://github.com/.

	Требования были: Добавить возможность получения данных от стороннего сервиса.
 */

namespace src\Decorator;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use src\Integration\DataProvider;

// TODO: Название DecoratorManager не соответствует коду
// TODO: У DataProvider для декорации должен быть общий интерфейс
// TODO: $cache и $logger должны быть обертками над базовым декоратором,
// TODO: это позволит клиенсткому коду легко управлять функциональностью (включать/выключать логер/кэш)
class DecoratorManager extends DataProvider
{
	// TODO: не должны быть публичными
	public $cache;
	public $logger;

	// TODO: опять же, связанные данные лучше выделять в объект
	// TODO: забыли логер в конструкторе
	/**
	 * @param string $host
	 * @param string $user
	 * @param string $password
	 * @param CacheItemPoolInterface $cache
	 */
	public function __construct($host, $user, $password, CacheItemPoolInterface $cache)
	{
		parent::__construct($host, $user, $password);
		$this->cache = $cache;
	}

	public function setLogger(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	// TODO: не соответствует название метода и название параметра с декорируемым классом
	/**
	 * {@inheritdoc}
	 */
	public function getResponse(array $input)
	{
		try {
			$cacheKey = $this->getCacheKey($input);
			$cacheItem = $this->cache->getItem($cacheKey);
			if ($cacheItem->isHit()) {
				return $cacheItem->get();
			}

			// TODO: у родителя это не статический метод, чтобы к нему так обращаться, должно быть $this->get($input)
			$result = parent::get($input);

			$cacheItem
				->set($result)
				->expiresAt(
					(new DateTime())->modify('+1 day')
				);

			return $result;
		// TODO: обрабатывать базовый Exception неправильно, нужны специфические классы ошибок и соответствующие действия
		} catch (Exception $e) {
			// TODO: сообщение можно сделать поинформативнее, что конкретно произошло
			// TODO: нужно прокинуть ошибку выше, иначе уйдет просто пустой массив
			$this->logger->critical('Error');
		}

		return [];
	}

	public function getCacheKey(array $input)
	{
		// TODO: input массив может быть огромным, лучше получить hash с $input
		return json_encode($input);
	}
}