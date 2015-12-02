<?php
namespace Noichl\ProductConfigurator\Article;
use Noichl\ProductConfigurator\Currency;
use Noichl\ProductConfigurator\Money;

/**
 * @covers \Noichl\ProductConfigurator\Article\ArticleWithMultipleOptions
 * @covers \Noichl\ProductConfigurator\Article\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\Article\ArticleIdentifier
 * @uses   \Noichl\ProductConfigurator\OptionSet\OptionSet
 */
class ArticleWithMultipleOptionsTest extends \PHPUnit_Framework_TestCase {

	use \Noichl\ProductConfigurator\TestHelper\CreateMoneyTrait;
	use \Noichl\ProductConfigurator\TestHelper\CreateOptionTrait;

	public function testBasePriceCanBeRetrieved() {

		$identifier = new ArticleIdentifier('testId');
		$price = $this->createMoney();
		$article = new ArticleWithMultipleOptions($identifier, 'TestArticle', $price, $this->createOption());

		$this->assertTrue($price->equals($article->basePrice()));
	}

	public function testTotalPriceWithOneOptionCanBeRetrieved() {

		$identifier = new ArticleIdentifier('testId');
		$optionPrice = $this->createMoney();
		$basePrice = $this->createMoney();

		$option = $this->createOption();
		$option->method('price')->willReturn($optionPrice);

		$article = new ArticleWithMultipleOptions($identifier, 'TestArticle', $basePrice, $option);

		$this->assertTrue($basePrice->addTo($optionPrice)->equals($article->totalPrice()));
	}

	public function testTotalPriceWithTwoOptionsCanBeRetrieved() {

		$identifier = new ArticleIdentifier('testId');
		$optionPrice1 = $this->createMoney();
		$optionPrice2 = $this->createMoney();
		$basePrice = $this->createMoney();

		$option1 = $this->createOption();
		$option1->method('price')->willReturn($optionPrice1);

		$option2 = $this->createOption();
		$option2->method('price')->willReturn($optionPrice2);

		$article = new ArticleWithMultipleOptions($identifier, 'TestArticle', $basePrice, $option1);
		$article->addOption($option2);

		$this->assertTrue($basePrice->addTo($optionPrice1)->addTo($optionPrice2)->equals($article->totalPrice()));
	}


	public function testTwoDifferentOptionsCanBeAdded() {

		$identifier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option1 = $this->createOption();
		$option2 = $this->createOption();

		$article = new ArticleWithMultipleOptions($identifier, 'TestArticle', $price, $option1);
		$article->addOption($option2);

		$this->assertAttributeContains($option1, 'options', $article); //tests implementation?
		$this->assertAttributeContains($option2, 'options', $article);
	}

	/**
	 * @expectedException \Noichl\ProductConfigurator\OptionSet\Exception\OptionNotAllowedException
	 */
	public function testSameOptionCantBeAddedTwice() {

		$identfier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option = $this->createOption();

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $price, $option);
		$article->addOption($option);
	}

	public function testNotMoreThanThreeOptionsCanBeAdded() {

		$identifier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option1 = $this->createOption();
		$option2 = $this->createOption();
		$option3 = $this->createOption();
		$option4 = $this->createOption();

		$article = new ArticleWithMultipleOptions($identifier, 'TestArticle', $price, $option1);
		$article->addOption($option2);
		$article->addOption($option3);

		$this->setExpectedException('\Noichl\ProductConfigurator\OptionSet\Exception\OptionMaxNumberExceededException');
		$article->addOption($option4);
	}
}
