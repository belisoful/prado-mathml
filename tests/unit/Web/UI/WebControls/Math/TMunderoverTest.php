<?php

use Prado\Web\UI\WebControls\Math\TMunderover;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMunderoverTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMunderover();
		$this->assertEquals('munderover', $control->getDefaultTagName());
		$this->assertEquals('munderover', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMunderover());
	}

	public function testDefaultsRenderNoAttributes()
	{
		$control = new TMunderover();
		$this->assertNull($control->getAccentUnder());
		$this->assertNull($control->getAccent());
		$output = $this->render($control);
		$this->assertStringContainsString('<munderover', $output);
		$this->assertStringNotContainsString('accentunder', $output);
		$this->assertStringNotContainsString('accent', $output);
	}

	public function testSetBothAccents()
	{
		$control = new TMunderover();
		$control->setAccentUnder(false);
		$control->setAccent(true);
		$this->assertFalse($control->getAccentUnder());
		$this->assertTrue($control->getAccent());
		$output = $this->render($control);
		$this->assertStringContainsString('accentunder="false"', $output);
		$this->assertStringContainsString('accent="true"', $output);
	}

	public function testClearAccents()
	{
		$control = new TMunderover();
		$control->setAccentUnder(true);
		$control->setAccent(true);
		$control->setAccentUnder('');
		$control->setAccent('');
		$this->assertNull($control->getAccentUnder());
		$this->assertNull($control->getAccent());
	}

	public function testNullClearsAccents()
	{
		$control = new TMunderover();
		$control->setAccent(true);
		$control->setAccentUnder(true);
		$control->setAccent(null);
		$control->setAccentUnder(null);
		$this->assertNull($control->getAccent());
		$this->assertNull($control->getAccentUnder());
		$this->assertStringNotContainsString('accent', $this->render($control));
	}
}
