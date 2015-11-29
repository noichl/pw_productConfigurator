<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\ArticleIdentifier
 */
class ArticleTest extends \PHPUnit_Framework_TestCase {

	public function testNameCanBeRetrieved() {

		$identifier = new ArticleIdentifier('TestId');
		$name = "Test Name";
		$price = new Money(1, new Currency('EUR'));
		$article = $this->getMockForAbstractClass(Article::class, [$identifier, $name, $price]);

		$this->assertEquals($name, $article->name());
	}

	public function testIdentifierCanBeRetrieved() {

		$name = "Test Name";
		$price = new Money(1, new Currency('EUR'));
		$identifier = new ArticleIdentifier('TestId');

		/** @var  \PHPUnit_Framework_MockObject_MockObject|Article $article */
		$article = $article = $this->getMockForAbstractClass(Article::class, [$identifier, $name, $price]);

		$this->assertEquals($identifier, $article->identifier());
	}
}
