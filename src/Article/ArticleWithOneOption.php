<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Article;

use Noichl\ProductConfigurator\Article;
use Noichl\ProductConfigurator\Money;
use Noichl\ProductConfigurator\Option;

/**
 * Class ArticleWithOneOption
 * Represents an article with the ability to add one option.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleWithOneOption extends Article {

	/**
	 * @var Option
	 */
	private $option;

	/**
	 * @param Option $option
	 */
	public function setOption(Option $option) {
		$this->option = $option;
	}

	/**
	 * @return Option
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
