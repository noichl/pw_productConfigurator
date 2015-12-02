<?php
namespace Noichl\ProductConfigurator;

use Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException;
use Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException;
use Noichl\ProductConfigurator\TestHelper\CreateOptionTrait;

/**
 * @covers \Noichl\ProductConfigurator\OptionSet
 */
class OptionSetTest extends \PHPUnit_Framework_TestCase {

	use CreateOptionTrait;

	public function testCanAddOption() {
		$set = new OptionSet();
		$option = $this->createOption();
		$set->add($option);

		$this->assertSame($option, $set->getIterator()->current());
	}

	public function testCanNotAddIfMaxItemsReached() {
		$maxItem = 2;
		$set = new OptionSet($maxItem);
		$set->add($this->createOption());
		$set->add($this->createOption());

		$this->setExpectedException(OptionMaxNumberExceededException::class);
		$set->add($this->createOption());

	}

	public function testCanNotAddOptionTwice() {
		$set = new OptionSet();
		$option = $this->createOption();

		$set->add($option);
		$this->setExpectedException(OptionNotAllowedException::class);
		$set->add($option);
	}


	public function testCanCount() {
		$set = new OptionSet();
		$set->add($this->createOption());
		$set->add($this->createOption());

		$this->assertEquals(2, $set->count());
	}

	public function testCanIterate() {
		$set = new OptionSet();

		$this->assertInstanceOf(\Traversable::class, $set->getIterator());
	}
}
