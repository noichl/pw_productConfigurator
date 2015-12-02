<?php

namespace Noichl\ProductConfigurator\Option;


abstract class OptionRestriction {

	/**
	 * Validates if there is a restriction with the given option.
	 *
	 * @param \Noichl\ProductConfigurator\Option $option
	 *
	 * @return bool True if there is conflict.
	 */
	abstract public function validate(\Noichl\ProductConfigurator\Option $option): bool;
}