<?php
namespace Noichl\ProductConfigurator\Option\Restriction;

/**
 * Class RestrictionCollection
 * Class Representing an Collection for OptionRestrictions
 *
 * @see Restriction
 *
 * @package Noichl\ProductConfigurator\Option\Option
 */
class RestrictionCollection implements \IteratorAggregate, \Countable {

	/**
	 * @var Restriction[]
	 */
	private $optionRestrictions = [];

	/**
	 * @param \Noichl\ProductConfigurator\Option\Restriction\Restriction $optionRestriction
	 */
	public function add(Restriction $optionRestriction) {
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