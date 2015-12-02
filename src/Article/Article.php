<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator\Article;

use Noichl\ProductConfigurator\Money;

abstract class Article {

	/**
	 * @var \Noichl\ProductConfigurator\Article\ArticleIdentifier
	 */
	private $identifier;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var Money
	 */
	private $basePrice;

	/**
	 * @param \Noichl\ProductConfigurator\Article\ArticleIdentifier $identifier
	 * @param string $name
	 * @param Money $basePrice
	 */
	public function __construct(ArticleIdentifier $identifier, string $name, Money $basePrice) {
		$this->basePrice = $basePrice;
		$this->name = $name;
		$this->identifier = $identifier;
	}

	/**
	 * @return \Noichl\ProductConfigurator\Article\ArticleIdentifier
	 */
	public function identifier(): ArticleIdentifier {
		return $this->identifier;
	}

	/**
	 * @return \string
	 */
	public function name(): string {
		return $this->name;
	}

	/**
	 * @return Money
	 */
	public function basePrice() :Money {
		return $this->basePrice;
	}

	/**
	 * @return Money
	 */
	abstract public function totalPrice() :Money;
}
