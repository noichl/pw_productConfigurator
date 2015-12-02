<?php
namespace Noichl\ProductConfigurator\TestHelper;

use Noichl\ProductConfigurator\Currency;
use Noichl\ProductConfigurator\Money;

trait CreateMoneyTrait {

	private function createMoney() {
		return new Money(rand(1, 10), new Currency('EUR'));
	}
}
