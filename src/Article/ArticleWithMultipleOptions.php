<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Article;

use Noichl\ProductConfigurator\Article;
use Noichl\ProductConfigurator\Money;
use Noichl\ProductConfigurator\Option;
use Noichl\ProductConfigurator\OptionSet;

/**
 * Class ArticleWithMultipleOptions
 * Represents an Article with min 1 and max 3 options.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleWithMultipleOptions extends Article {

	/**
	 * @var OptionSet
	 */
	private $options;

	/**
	 * @param \Noichl\ProductConfigurator\Article\ArticleIdentifier $identifier
	 * @param string $name
	 * @param Money $basePrice
	 * @param Option $option
	 */
	public function __construct(ArticleIdentifier $identifier, string $name, Money $basePrice, Option $option) {
		parent::__construct($identifier, $name, $basePrice);

		$this->options = new OptionSet(3);
		$this->options->add($option);
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
	 *
	 * @param Option $option
	 *
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException
	 *                If max number of options for an article is exceeded.
	 * @throws \Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException
	 *                If the added option is not allowed.
	 */
	public function addOption(Option $option) {
		$this->options->add($option);
	}
}
