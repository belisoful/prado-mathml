<?php

use Prado\Web\UI\WebControls\Math\TMfrac;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMfracTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMfrac();
		$this->assertEquals('mfrac', $control->getDefaultTagName());
		$this->assertEquals('mfrac', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMfrac());
	}

	public function testDefaultRendersNoLineThickness()
	{
		$control = new TMfrac();
		$this->assertEquals('', $control->getLineThickness());
		$output = $this->render($control);
		$this->assertStringContainsString('<mfrac', $output);
		$this->assertStringNotContainsString('linethickness', $output);
	}

	public function testSetLineThicknessRendersAttribute()
	{
		$control = new TMfrac();
		$control->setLineThickness('0');
		$this->assertEquals('0', $control->getLineThickness());
		$output = $this->render($control);
		$this->assertStringContainsString('linethickness="0"', $output);
	}
}
