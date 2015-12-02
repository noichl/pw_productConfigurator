<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Option;

use Noichl\ProductConfigurator\Money;
use Noichl\ProductConfigurator\Option\Restriction\Restriction;
use Noichl\ProductConfigurator\Option\Restriction\RestrictionCollection;

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
	 * @var RestrictionCollection
	 */
	private $restrictions;

	/**
	 * @param \Noichl\ProductConfigurator\Money $price
	 * @param \Noichl\ProductConfigurator\Option\Restriction\RestrictionCollection $restrictions
	 */
	public function __construct(Money $price, RestrictionCollection $restrictions) {
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
	 * @param \Noichl\ProductConfigurator\Option\Restriction\Restriction $restriction
	 */
	public function addRestriction(Restriction $restriction) {
		$this->restrictions->add($restriction);
	}
}
