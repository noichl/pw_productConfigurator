<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\ArticleWithOneOption
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\ArticleIdentifier
 */
class ArticleWithOneOptionTest extends \PHPUnit_Framework_TestCase {

	use CreateMoneyTrait;

	public function testBasePriceCanBeRetrieved() {
		$identifier = new ArticleIdentifier('TestID');
		$price = new Money(1, new Currency('EUR'));
		$article = new ArticleWithOneOption($identifier, 'TestArticle',$price);

		$this->assertTrue($price->equals($article->basePrice()));
	}

	public function testOptionCanBeSet() {
		$identifier = new ArticleIdentifier('TestID');
		$price = new Money(1, new Currency('EUR'));

		$option = $this->createOption();

		$article = new ArticleWithOneOption($identifier, 'TestArticle', $price);
		$article->setOption($option);

		$this->assertSame($option, $article->getOption());
	}

	public function testTotalPriceWithOptionCanBeRetrieved() {
		$identifier = new ArticleIdentifier('TestID');
		$optionPrice = $this->createMoney();
		$basePrice = $this->createMoney();

		$option = $this->createOption();
		$option->method('price')->willReturn($optionPrice);

		$article = new ArticleWithOneOption($identifier, 'TestArticle', $basePrice);
		$article->setOption($option);

		$this->assertTrue($basePrice->addTo($optionPrice)->equals($article->totalPrice()));
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject|Option
	 */
	private function createOption() {
		return $this->getMockBuilder(Option::class)
			->disableOriginalConstructor()
			->getMock();
	}
}
