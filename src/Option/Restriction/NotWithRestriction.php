<?php
namespace Noichl\ProductConfigurator\Option\Restriction;

class NotWithRestriction extends Restriction {

	/**
	 * @var \Noichl\ProductConfigurator\Option\Option
	 */
	private $option;

	/**
	 * NotWithRestriction constructor.
	 */
	public function __construct(\Noichl\ProductConfigurator\Option\Option $option) {
		$this->option = $option;
	}

	/**
	 * @param \Noichl\ProductConfigurator\Option\Option $option
	 *
	 * @return bool
	 */
	public function validate(\Noichl\ProductConfigurator\Option\Option $option): bool {
		return $this->option !== $option;
	}

}