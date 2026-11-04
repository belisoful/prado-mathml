<?php

use Prado\Web\UI\WebControls\Math\TMi;
use Prado\Exceptions\TInvalidDataValueException;
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

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMi());
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
		$control->setMathVariant('normal');
		$this->assertEquals('normal', $control->getMathVariant());
		$output = $this->render($control);
		$this->assertStringContainsString('mathvariant="normal"', $output);
	}

	public function testMathVariantIsCaseInsensitive()
	{
		$control = new TMi();
		$control->setMathVariant('Normal');
		$this->assertSame('normal', $control->getMathVariant());
	}

	public function testMathVariantClears()
	{
		$control = new TMi();
		$control->setMathVariant('normal');
		$control->setMathVariant('');
		$this->assertSame('', $control->getMathVariant());
		$control->setMathVariant('normal');
		$control->setMathVariant(null);
		$this->assertSame('', $control->getMathVariant());
		$this->assertStringNotContainsString('mathvariant', $this->render($control));
	}

	public function testMathVariantOutsideCoreThrows()
	{
		$control = new TMi();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The <mi> MathVariant 'bold' must be 'normal' or empty.");
		$control->setMathVariant('bold');
	}
}
