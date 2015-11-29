<?php
namespace Noichl\ProductConfigurator;

/**
 * @covers \Noichl\ProductConfigurator\ArticleWithMultipleOptions
 * @covers \Noichl\ProductConfigurator\Article
 * @uses   \Noichl\ProductConfigurator\Money
 * @uses   \Noichl\ProductConfigurator\Currency
 * @uses   \Noichl\ProductConfigurator\ArticleIdentifier
 */
class ArticleWithMultipleOptionsTest extends \PHPUnit_Framework_TestCase {

	use CreateMoneyTrait;

	public function testBasePriceCanBeRetrieved() {

		$identfier = new ArticleIdentifier('testId');
		$price = $this->createMoney();
		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $price, $this->createOption());

		$this->assertTrue($price->equals($article->basePrice()));
	}

	public function testTotalPriceWithOneOptionCanBeRetrieved() {

		$identfier = new ArticleIdentifier('testId');
		$optionPrice = $this->createMoney();
		$basePrice = $this->createMoney();

		$option = $this->createOption();
		$option->method('price')->willReturn($optionPrice);

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $basePrice, $option);

		$this->assertTrue($basePrice->addTo($optionPrice)->equals($article->totalPrice()));
	}

	public function testTotalPriceWithTwoOptionsCanBeRetrieved() {

		$identfier = new ArticleIdentifier('testId');
		$optionPrice1 = $this->createMoney();
		$optionPrice2 = $this->createMoney();
		$basePrice = $this->createMoney();

		$option1 = $this->createOption();
		$option1->method('price')->willReturn($optionPrice1);

		$option2 = $this->createOption();
		$option2->method('price')->willReturn($optionPrice2);

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $basePrice, $option1);
		$article->addOption($option2);

		$this->assertTrue($basePrice->addTo($optionPrice1)->addTo($optionPrice2)->equals($article->totalPrice()));
	}


	public function testTwoDifferentOptionsCanBeAdded() {

		$identfier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option1 = $this->createOption();
		$option2 = $this->createOption();

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $price, $option1);
		$article->addOption($option2);

		$this->assertAttributeContains($option1, 'options', $article); //tests implementation?
		$this->assertAttributeContains($option2, 'options', $article);
	}

	/**
	 * @expectedException \Noichl\ProductConfigurator\Exception\OptionNotAllowedException
	 */
	public function testSameOptionCantBeAddedTwice() {

		$identfier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option = $this->createOption();

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $price, $option);
		$article->addOption($option);
	}

	public function testNotMoreThanThreeOptionsCanBeAdded() {

		$identfier = new ArticleIdentifier('testId');
		$price = new Money(1, new Currency('EUR'));

		$option1 = $this->createOption();
		$option2 = $this->createOption();
		$option3 = $this->createOption();
		$option4 = $this->createOption();

		$article = new ArticleWithMultipleOptions($identfier, 'TestArticle', $price, $option1);
		$article->addOption($option2);
		$article->addOption($option3);

		$this->setExpectedException('\Noichl\ProductConfigurator\Exception\OptionMaxNumberExceededException');
		$article->addOption($option4);
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
