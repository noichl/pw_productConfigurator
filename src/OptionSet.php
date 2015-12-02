<?php

namespace Noichl\ProductConfigurator;

use Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException;
use Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException;

class OptionSet implements \IteratorAggregate, \Countable {

	/**
	 * @var Option[]
	 */
	private $options = [];

	/**
	 * OptionSet constructor.
	 *
	 * @param int $maxItems
	 */
	public function __construct(int $maxItems = null) {
		$this->maxItems = $maxItems;
	}


	/**
	 * @param \Noichl\ProductConfigurator\Option $option
	 *
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException
	 */
	public function add(Option $option) {
		$this->ensureOptionIsNotAlreadyPresent($option);
		$this->ensureMaximumNumberOfOptionsIsNotExceeded();

		$this->options[] = $option;
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator() : \ArrayIterator {
		return new \ArrayIterator($this->options);
	}

	/**
	 * @return int
	 */
	public function count(): int {
		return count($this->options);
	}

	/**
	 * @param \Noichl\ProductConfigurator\Option $option
	 *
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException
	 */
	private function ensureOptionIsNotAlreadyPresent(Option $option) {
		if (in_array($option, $this->options, TRUE)) {
			throw new OptionNotAllowedException('Option is already added.', 1448824185288);
		}
	}

	/**
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException
	 */
	private function ensureMaximumNumberOfOptionsIsNotExceeded() {
		if ($this->maxItems === null){
			return;
		}

		if (count($this->options) >= $this->maxItems) {
			throw new OptionMaxNumberExceededException('Maximal number of options is already obtained.', 1448825448486);
		}
	}
}