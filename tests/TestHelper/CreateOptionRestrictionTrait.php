<?php
namespace Noichl\ProductConfigurator\TestHelper;

use Noichl\ProductConfigurator\Option\Restriction\Restriction;

trait CreateOptionRestrictionTrait {

	/**
	 * @return \Noichl\ProductConfigurator\Option\Restriction\Restriction | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function createOptionRestriction() {
		return $this->getMockBuilder(Restriction::class)
					->disableOriginalConstructor()
					->getMock();
	}
}
