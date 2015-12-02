<?php

namespace Noichl\ProductConfigurator\Option;

/**
 * Class OptionRestrictionCollection
 * Class Representing an Collection for OptionRestrictions
 *
 * @see OptionRestriction
 *
 * @package Noichl\ProductConfigurator\Option
 */
class OptionRestrictionCollection implements \IteratorAggregate, \Countable {

	/**
	 * @var OptionRestriction[]
	 */
	private $optionRestrictions = [];

	/**
	 * @param \Noichl\ProductConfigurator\Option\OptionRestriction $optionRestriction
	 */
	public function add(OptionRestriction $optionRestriction) {
		$this->optionRestrictions[] = $optionRestriction;
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator() : \ArrayIterator {
		return new \ArrayIterator($this->optionRestrictions);
	}

	/**
	 * @return int
	 */
	public function count(): int {
		return count($this->optionRestrictions);
	}
}