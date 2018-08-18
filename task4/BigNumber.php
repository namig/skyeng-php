<?php

/**
 * Class BigNumber
 *
 * Класс для работы с большими целыми положительными числами представленными в виде строк.
 * Позволяет складывать их.
 */
class BigNumber
{
	/**
	 * Исходное число в виде строки
	 * @var string
	 */
	private $original;

	/**
	 * BigNumber constructor.
	 * @param string $original
	 * @throws Exception
	 */
	function __construct(string $original)
	{
		if (trim($original) == '') {
			throw new \Exception("String is empty");
		}
		$this->original = $original;
	}

	public function __toString()
	{
		return $this->original;
	}

	/**
	 * Возвращает количество символов в исходной строке
	 * @return int
	 */
	public function getLength(): int
	{
		return strlen($this->original);
	}

	/**
	 * Преобразовать в массив символов
	 * @return array
	 */
	private function toArray(): array
	{
		return str_split($this->getOriginal());
	}

	/**
	 * Получить массив символов в обратном порядке
	 * @return array
	 */
	private function getReversedArray(): array
	{
		return array_reverse($this->toArray());
	}

	/**
	 * Получить исходное число в виде строки
	 * @return string
	 */
	public function getOriginal(): ?string
	{
		return $this->original;
	}

	/**
	 * Считает сумму двух чисел
	 *
	 * @param BigNumber $num1
	 * @param BigNumber $num2
	 * @return BigNumber
	 */
	public static function sum(BigNumber $num1, BigNumber $num2): BigNumber
	{
		// Делаем чтобы первое число было всегда длиннее второго
		if ($num1->getLength() < $num2->getLength()) {
			$buffer = $num1;
			$num1 = $num2;
			$num2 = $buffer;
		}

		$arr1 = $num1->getReversedArray();
		$arr2 = $num2->getReversedArray();
		$arr1Length = $num1->getLength();
		$res = [];
		// Остаток в уме
		$mind = 0;

		for ($i = 0; $i < $arr1Length; $i++) {
			$cur1 = (int)$arr1[$i];
			$cur2 = (int)$arr2[$i];
			$curSum = $cur1 + $cur2 + $mind;

			if ($curSum > 9) {
				$mind = 1;
				$curSum = $curSum % 10;
			} else {
				$mind = 0;
			}

			array_push($res, $curSum);
		}

		if ($mind == 1) {
			array_push($res, 1);
		}

		return new BigNumber(implode(array_reverse($res)));
	}
}