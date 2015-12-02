<?php
namespace Noichl\ProductConfigurator\Option\Restriction;


abstract class Restriction{

	/**
	 * Validates if there is a restriction with the given option.
	 *
	 * @param \Noichl\ProductConfigurator\Option\Option $option
	 *
	 * @return bool True if there is conflict.
	 */
	abstract public function validate(\Noichl\ProductConfigurator\Option\Option $option): bool;
}