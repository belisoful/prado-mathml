<?php

use Prado\Web\UI\WebControls\Math\TMath;
use Prado\Web\UI\WebControls\Math\TMathElement;
use Prado\Exceptions\TInvalidDataValueException;
use PHPUnit\Framework\TestCase;

class TMathTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMath();
		$this->assertEquals('math', $control->getDefaultTagName());
		$this->assertEquals('math', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMath());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMath());
		$this->assertStringContainsString('<math', $output);
		$this->assertStringContainsString('</math>', $output);
	}

	public function testDisplayDefaultsEmptyAndRendersNoAttribute()
	{
		$control = new TMath();
		$this->assertEquals('', $control->getDisplay());
		$output = $this->render($control);
		$this->assertStringNotContainsString('display', $output);
	}

	public function testSetDisplayBlockRendersAttribute()
	{
		$control = new TMath();
		$control->setDisplay('block');
		$this->assertEquals('block', $control->getDisplay());
		$output = $this->render($control);
		$this->assertStringContainsString('display="block"', $output);
	}

	public function testSetDisplayInline()
	{
		$control = new TMath();
		$control->setDisplay('inline');
		$this->assertEquals('inline', $control->getDisplay());
	}

	public function testSetDisplayEmptyClearsAttribute()
	{
		$control = new TMath();
		$control->setDisplay('block');
		$control->setDisplay('');
		$this->assertEquals('', $control->getDisplay());
		$this->assertStringNotContainsString('display', $this->render($control));
	}

	public function testSetDisplayInvalidThrows()
	{
		$control = new TMath();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The <math> Display 'sideways' must be 'block', 'inline', or empty.");
		$control->setDisplay('sideways');
	}

	public function testDisplayIsCaseInsensitive()
	{
		$control = new TMath();
		$control->setDisplay('Block');
		$this->assertSame('block', $control->getDisplay());
		$this->assertStringContainsString('display="block"', $this->render($control));
	}

	public function testDisplayNullClears()
	{
		$control = new TMath();
		$control->setDisplay('block');
		$control->setDisplay(null);
		$this->assertSame('', $control->getDisplay());
	}
}
