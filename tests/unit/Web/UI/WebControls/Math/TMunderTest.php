<?php

use Prado\Web\UI\WebControls\Math\TMunder;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMunderTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMunder();
		$this->assertEquals('munder', $control->getDefaultTagName());
		$this->assertEquals('munder', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMunder());
	}

	public function testAccentUnderDefaultsNullAndRendersNoAttribute()
	{
		$control = new TMunder();
		$this->assertNull($control->getAccentUnder());
		$output = $this->render($control);
		$this->assertStringContainsString('<munder', $output);
		$this->assertStringNotContainsString('accentunder', $output);
	}

	public function testSetAccentUnderTrueAndFalse()
	{
		$control = new TMunder();
		$control->setAccentUnder(true);
		$this->assertTrue($control->getAccentUnder());
		$this->assertStringContainsString('accentunder="true"', $this->render($control));

		$control->setAccentUnder(false);
		$this->assertFalse($control->getAccentUnder());
		$this->assertStringContainsString('accentunder="false"', $this->render($control));
	}

	public function testSetAccentUnderEmptyClears()
	{
		$control = new TMunder();
		$control->setAccentUnder(true);
		$control->setAccentUnder('');
		$this->assertNull($control->getAccentUnder());
	}
}
