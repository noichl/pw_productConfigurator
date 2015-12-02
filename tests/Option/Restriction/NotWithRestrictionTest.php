<?php
namespace Noichl\ProductConfigurator\Option\Restriction;

/**
 * @covers \Noichl\ProductConfigurator\Option\Restriction\NotWithRestriction
 */
class NotWithRestrictionTest extends \PHPUnit_Framework_TestCase {

	use \Noichl\ProductConfigurator\TestHelper\CreateOptionTrait;

	/**
	 * @var \Noichl\ProductConfigurator\Option\Option
	 */
	private $notWithOption;

	/**
	 * @var Restriction
	 */
	private $restiction;

	public function setUp() {
		$this->notWithOption = $this->createOption();
		$this->restiction = new NotWithRestriction($this->notWithOption);
	}

	public function testIsNotValidWithGivenOption() {
		$this->assertFalse($this->restiction->validate($this->notWithOption));
	}

	public function testIsValidWithAnyOtherOption() {
		$this->assertTrue($this->restiction->validate($this->createOption()));
	}
}
