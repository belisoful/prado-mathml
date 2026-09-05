<?php

use Prado\Web\UI\WebControls\Math\TMover;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMoverTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMover();
		$this->assertEquals('mover', $control->getDefaultTagName());
		$this->assertEquals('mover', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMover());
	}

	public function testAccentDefaultsNullAndRendersNoAttribute()
	{
		$control = new TMover();
		$this->assertNull($control->getAccent());
		$output = $this->render($control);
		$this->assertStringContainsString('<mover', $output);
		$this->assertStringNotContainsString('accent', $output);
	}

	public function testSetAccentTrueAndFalse()
	{
		$control = new TMover();
		$control->setAccent(true);
		$this->assertTrue($control->getAccent());
		$this->assertStringContainsString('accent="true"', $this->render($control));

		$control->setAccent(false);
		$this->assertFalse($control->getAccent());
		$this->assertStringContainsString('accent="false"', $this->render($control));
	}

	public function testSetAccentEmptyClears()
	{
		$control = new TMover();
		$control->setAccent(true);
		$control->setAccent('');
		$this->assertNull($control->getAccent());
	}
}
