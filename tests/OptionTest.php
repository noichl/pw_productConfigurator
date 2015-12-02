<?php
namespace Noichl\ProductConfigurator;

use Noichl\ProductConfigurator\Option\OptionRestrictionCollection;
use Noichl\ProductConfigurator\TestHelper\CreateMoneyTrait;
use Noichl\ProductConfigurator\TestHelper\CreateOptionRestrictionTrait;

/**
 * @covers \Noichl\ProductConfigurator\Option
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 */
class OptionTest extends \PHPUnit_Framework_TestCase {

	use CreateMoneyTrait;
	use CreateOptionRestrictionTrait;
	/**
	 * @var Money
	 */
	private $price;

	/**
	 * @var Option
	 */
	private $option;

	/**
	 * @var OptionRestrictionCollection | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $restrictionCollection;

	public function setUp() {
		$this->price = $this->createMoney();
		$this->restrictionCollection = $this->getMockBuilder(OptionRestrictionCollection::class)
											->disableOriginalConstructor()
											->getMock();
		$this->option = new Option($this->price, $this->restrictionCollection);
	}

	public function testPriceCanBeRetrieved() {
		$this->assertTrue($this->price->equals($this->option->price()));
	}

	public function testRestrictionCanBeAdded() {
		$restriction = $this->createOptionRestriction();

		$this->restrictionCollection->expects($this->once())->method('add')->with($restriction);
		$this->option->addRestriction($restriction);
	}
}
