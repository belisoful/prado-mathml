<?php

use Prado\Web\UI\WebControls\Math\TMi;
use Prado\Web\UI\WebControls\Math\TMathToken;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMiTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMi();
		$this->assertEquals('mi', $control->getDefaultTagName());
		$this->assertEquals('mi', $control->getTagName());
	}

	public function testExtendsTMathToken()
	{
		$control = new TMi();
		$this->assertInstanceOf(TMathToken::class, $control);
		$this->assertInstanceOf(TMathElement::class, $control);
	}

	public function testRendersTag()
	{
		$control = new TMi();
		$control->getControls()->add('x');
		$output = $this->render($control);
		$this->assertStringContainsString('<mi', $output);
		$this->assertStringContainsString('x', $output);
		$this->assertStringContainsString('</mi>', $output);
	}

	public function testMathVariantDefaultsEmptyAndRendersNoAttribute()
	{
		$control = new TMi();
		$this->assertEquals('', $control->getMathVariant());
		$output = $this->render($control);
		$this->assertStringNotContainsString('mathvariant', $output);
	}

	public function testSetMathVariantRendersAttribute()
	{
		$control = new TMi();
		$control->setMathVariant('bold');
		$this->assertEquals('bold', $control->getMathVariant());
		$output = $this->render($control);
		$this->assertStringContainsString('mathvariant="bold"', $output);
	}
}
