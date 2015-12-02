<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;
use Noichl\ProductConfigurator\Option\OptionRestriction;
use Noichl\ProductConfigurator\Option\OptionRestrictionCollection;

/**
 * Class Option
 * Representing an option which can be added to articles.
 * Options are additional services available on some articles.
 *
 * @package Noichl\ProductConfigurator
 */
class Option {

	/**
	 * @var Money
	 */
	private $price;

	/**
	 * @var OptionRestrictionCollection
	 */
	private $restrictions;

	/**
	 * @param \Noichl\ProductConfigurator\Money $price
	 * @param \Noichl\ProductConfigurator\Option\OptionRestrictionCollection $restrictions
	 */
	public function __construct(Money $price, OptionRestrictionCollection $restrictions) {
		$this->price = $price;
		$this->restrictions = $restrictions;
	}

	/**
	 * @return Money
	 */
	public function price() :Money {
		return $this->price;
	}

	/**
	 * @param \Noichl\ProductConfigurator\Option\OptionRestriction $restriction
	 */
	public function addRestriction(OptionRestriction $restriction) {
		$this->restrictions->add($restriction);
	}
}
