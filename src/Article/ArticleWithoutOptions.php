<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Article;

use Noichl\ProductConfigurator\Article;
use Noichl\ProductConfigurator\Money;

/**
 * Class ArticleWithoutOptions
 * Represents an article which can't hold options.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleWithoutOptions extends Article {

	/**
	 * @return \Noichl\ProductConfigurator\Money
	 */
	public function totalPrice() :Money {
		return $this->basePrice();
	}
}
