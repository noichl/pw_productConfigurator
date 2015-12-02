<?php
namespace Noichl\ProductConfigurator\Option\Restriction;

use Noichl\ProductConfigurator\Option\OptionRestriction;

class NotWithRestriction extends OptionRestriction {

	/**
	 * @var \Noichl\ProductConfigurator\Option
	 */
	private $option;

	/**
	 * NotWithRestriction constructor.
	 */
	public function __construct(\Noichl\ProductConfigurator\Option $option) {
		$this->option = $option;
	}

	/**
	 * @param \Noichl\ProductConfigurator\Option $option
	 *
	 * @return bool
	 */
	public function validate(\Noichl\ProductConfigurator\Option $option): bool {
		return $this->option !== $option;
	}

}