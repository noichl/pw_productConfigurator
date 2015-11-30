<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

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
	 * @param $price
	 */
	public function __construct(Money $price) {
		$this->price = $price;
	}

	/**
	 * @return Money
	 */
	public function price() :Money {
		return $this->price;
	}
}
