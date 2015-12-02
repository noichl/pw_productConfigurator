<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Article;

use Noichl\ProductConfigurator\Money;
use Noichl\ProductConfigurator\Option\Option;

/**
 * Class ArticleWithOneOption
 * Represents an article with the ability to add one option.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleWithOneOption extends Article {

	/**
	 * @var \Noichl\ProductConfigurator\Option\Option
	 */
	private $option;

	/**
	 * @param \Noichl\ProductConfigurator\Option\Option $option
	 */
	public function setOption(Option $option) {
		$this->option = $option;
	}

	/**
	 * @return \Noichl\ProductConfigurator\Option\Option
	 */
	public function getOption() :Option {
		return $this->option;
	}

	/**
	 * @return Money
	 */
	public function totalPrice() :Money {
		return $this->basePrice()->addTo($this->option->price());
	}
}
