<?php
namespace Noichl\ProductConfigurator\TestHelper;

use Noichl\ProductConfigurator\Option\OptionRestriction;

trait CreateOptionRestrictionTrait {

	/**
	 * @return OptionRestriction | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function createOptionRestriction() {
		return $this->getMockBuilder(OptionRestriction::class)
					->disableOriginalConstructor()
					->getMock();
	}
}
