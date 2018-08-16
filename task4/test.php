<?php

require "BigNumber.php";

$arr = [
	['4', '6'],
	['12', '3'],
	['19', '5'],
	['99', '1'],
	['55', '999'],
	['345', '900'],
	['0', '155'],
	['15', ''],
	['992939239293929392932939239293929329', '82984028304892348092384092384902390324234234'],
];

function testArray(array $arr)
{
	foreach ($arr as $item) {
		$num1 = $item[0];
		$num2 = $item[1];
		try {
			testItem($num1, $num2);
		} catch (\Exception $e) {
			$format = '%s + %s Exception message: %s'.PHP_EOL;
			echo sprintf($format, $num1,$num2, $e->getMessage());
		}
	}
}

function testItem($n1, $n2)
{
	$num1 = new BigNumber($n1);
	$num2 = new BigNumber($n2);
	$format = '%s + %s = %s' . PHP_EOL;
	echo sprintf($format,
		$num1->getOriginal(),
		$num2->getOriginal(),
		BigNumber::sum($num1, $num2));
}

testArray($arr);