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

	/**
	 * @var ArticleIdentifier
	 */
	private $identifier;

	/**
	 * @var Money
	 */
	private $basePrice;

	/**
	 * @var ArticleWithOneOption
	 */
	private $article;

	public function setUp() {
		$this->identifier = new ArticleIdentifier('TestID');
		$this->basePrice = $this->createMoney();
		$this->article = new ArticleWithOneOption($this->identifier, 'TestArticle', $this->basePrice);
	}

	public function testBasePriceCanBeRetrieved() {
		$this->assertTrue($this->basePrice->equals($this->article->basePrice()));
	}

	public function testOptionCanBeSet() {

		$option = $this->createOption();
		$this->article->setOption($option);

		$this->assertSame($option, $this->article->getOption());
	}

	public function testTotalPriceWithOptionCanBeRetrieved() {

		$optionPrice = $this->createMoney();
		$option = $this->createOption();
		$option->method('price')->willReturn($optionPrice);

		$this->article->setOption($option);

		$this->assertTrue($this->basePrice->addTo($optionPrice)->equals($this->article->totalPrice()));
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
