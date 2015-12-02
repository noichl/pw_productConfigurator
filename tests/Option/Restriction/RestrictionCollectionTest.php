<?php
namespace Noichl\ProductConfigurator\Option\Restriction;

/**
 * @covers Noichl\ProductConfigurator\Option\Restriction\RestrictionCollection
 */
class RestrictionCollectionTest extends \PHPUnit_Framework_TestCase {

	use \Noichl\ProductConfigurator\TestHelper\CreateOptionRestrictionTrait;

	/**
	 * @var RestrictionCollection
	 */
	private $collection;

	public function setUp() {

		$this->collection = new RestrictionCollection();
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
