<?php
namespace Noichl\ProductConfigurator\TestHelper;

use Noichl\ProductConfigurator\Option;

trait CreateOptionTrait {

	/**
	 * @return Option | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function createOption() {
		return $this->getMockBuilder(Option::class)
					->disableOriginalConstructor()
					->getMock();
	}
}
