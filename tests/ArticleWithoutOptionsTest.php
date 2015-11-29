<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\ArticleWithoutOptions
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\ArticleIdentifier
 */
class ArticleWithoutOptionsTest extends \PHPUnit_Framework_TestCase {

	public function testTotalPriceCanBeRetrieved() {
		$identifier = new ArticleIdentifier('TestID');
		$price = new Money(1, new Currency('EUR'));

		$article = new ArticleWithoutOptions($identifier, 'TestArticle', $price);

		$this->assertSame($price, $article->totalPrice());
	}
}
