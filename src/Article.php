<?php declare(strict_types = 1);
namespace Noichl\ProductConfigurator;

abstract class Article {

	/**
	 * @var \Noichl\ProductConfigurator\ArticleIdentifier
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
	 * @param \Noichl\ProductConfigurator\ArticleIdentifier $identifier
	 * @param \Noichl\ProductConfigurator\string|string $name
	 * @param Money $basePrice
	 */
	public function __construct(ArticleIdentifier $identifier, string $name, Money $basePrice) {
		$this->basePrice = $basePrice;
		$this->name = $name;
		$this->identifier = $identifier;
	}

	/**
	 * @return \Noichl\ProductConfigurator\ArticleIdentifier
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
