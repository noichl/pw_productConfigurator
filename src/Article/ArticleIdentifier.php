<?php

namespace Noichl\ProductConfigurator\Article;

/**
 * Class ArticleIdentifier
 * Represents an identifier for article.
 *
 * @package Noichl\ProductConfigurator
 */
class ArticleIdentifier {

	/**
	 * @var string
	 */
	private $identifier;

	/**
	 * ArticleIdentifier constructor.
	 *
	 * @param string $identifier
	 */
	public function __construct(string $identifier) {
		$this->ensureIdentifierNotEmpty($identifier);

		$this->identifier = $identifier;
	}

	/**
	 * @return string
	 */
	public function identifier(): string {
		return $this->identifier;
	}

	/**
	 * @return bool
	 */
	public function equals(ArticleIdentifier $articleIdentifier): bool {
		return $this->identifier() === $articleIdentifier->identifier();
	}

	private function ensureIdentifierNotEmpty(string $identifier) {
		if (strlen($identifier) === 0){
			throw new \InvalidArgumentException('Identifier must not be empty.', 1448835788862);
		}
	}
}