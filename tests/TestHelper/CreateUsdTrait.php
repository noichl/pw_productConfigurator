<?php
namespace Noichl\ProductConfigurator\TestHelper;

use Noichl\ProductConfigurator\Currency;
use Noichl\ProductConfigurator\Money;

trait CreateUsdTrait {

	/**
	 * @return Money | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function createUsd() {
		$usd = $this->getMockBuilder(Currency::class)
			->disableOriginalConstructor()
			->getMock();

		$usd->method('currency')->willReturn('USD');

		return $usd;
	}
}

