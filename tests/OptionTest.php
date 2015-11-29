<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\Option
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 */
class OptionTest extends \PHPUnit_Framework_TestCase {

	use CreateMoneyTrait;

	public function testPriceCanBeRetrieved() {
		$price = $this->createMoney();

		$option = new Option($price);

		$this->assertTrue($price->equals($option->price()));
	}
}
