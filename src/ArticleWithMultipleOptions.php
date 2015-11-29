<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

use Noichl\ProductConfigurator\Exception\OptionMaxNumberExceededException;
use Noichl\ProductConfigurator\Exception\OptionNotAllowedException;

/**
 * Class ArticleWithMultipleOptions
 * Represents an Article with min 1 and max 3 options.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleWithMultipleOptions extends Article {

	/**
	 * @var Option[]
	 */
	private $options = [];

	/**
	 * @param \Noichl\ProductConfigurator\ArticleIdentifier $identifier
	 * @param string $name
	 * @param Money $basePrice
	 * @param Option $option
	 */
	public function __construct(ArticleIdentifier $identifier, string $name, Money $basePrice, Option $option) {
		parent::__construct($identifier, $name, $basePrice);

		$this->options[] = $option;
	}

	/**
	 * Gets the total price of an article.
	 *
	 * @override
	 * @return Money
	 */
	public function totalPrice() :Money {
		$price = $this->basePrice();

		foreach ($this->options as $option) {
			$price = $price->addTo($option->price());
		}

		return $price;
	}

	/**
	 * Adds an option
	 * @param Option $option
	 *
	 * @throws \Noichl\ProductConfigurator\Exception\OptionMaxNumberExceededException
	 * 				If max number of options for an article is exceeded.
	 * @throws \Noichl\ProductConfigurator\Exception\OptionNotAllowedException
	 *				If the added option is not allowed.
	 */
	public function addOption(Option $option) {
		$this->ensureOptionIsNotAlreadyPresent($option);
		$this->ensureMaximumNumberOfOptionsIsNotExceeded();

		$this->options[] = $option;
	}

	private function ensureOptionIsNotAlreadyPresent(Option $option) {
		if(in_array($option, $this->options, true)) {
			throw new OptionNotAllowedException('Option is already added.', 1448824185288);
		}
	}

	private function ensureMaximumNumberOfOptionsIsNotExceeded() {
		if (count($this->options) >= 3) {
			throw new OptionMaxNumberExceededException('Maximal number of options is already obtained.', 1448825448486);
		}
	}
}
