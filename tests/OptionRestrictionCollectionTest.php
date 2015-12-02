<?php
namespace Noichl\ProductConfigurator\Option;
use Noichl\ProductConfigurator\CreateOptionRestrictionTrait;

/**
 * @covers Noichl\ProductConfigurator\Option\OptionRestrictionCollection
 */
class OptionRestrictionCollectionTest extends \PHPUnit_Framework_TestCase {

	use CreateOptionRestrictionTrait;

	/**
	 * @var OptionRestrictionCollection
	 */
	private $collection;

	public function setUp() {

		$this->collection = new OptionRestrictionCollection();
	}

	public function testCanAddRestrictions() {
		$restriction = $this->createOptionRestriction();
		$this->collection->add($restriction);
		$this->assertSame($restriction, $this->collection->getIterator()->current());
	}

	public function testCanCount() {
		for($i=0; $i < 5; $i++){
			$this->collection->add($this->createOptionRestriction());
		}
		$this->assertEquals(5, $this->collection->count());
	}
}
