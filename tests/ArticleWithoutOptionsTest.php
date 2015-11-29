<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\ArticleWithoutOptions
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 */
class ArticleWithoutOptionsTest extends \PHPUnit_Framework_TestCase {

	public function testTotalPriceCanBeRetrieved() {
		$price = new Money(1, new Currency('EUR'));

		$article = new ArticleWithoutOptions($price);

		$this->assertSame($price, $article->totalPrice());
	}
}
