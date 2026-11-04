<?php

use Prado\Web\UI\WebControls\Math\TMs;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMsTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMs();
		$this->assertEquals('ms', $control->getDefaultTagName());
		$this->assertEquals('ms', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMs());
	}

	public function testRendersTextContent()
	{
		$control = new TMs();
		$control->getControls()->add('"abc"');
		$output = $this->render($control);
		$this->assertStringContainsString('<ms>"abc"</ms>', $output);
	}

	public function testHasNoQuoteProperties()
	{
		$control = new TMs();
		$this->assertFalse(method_exists($control, 'setLQuote'));
		$this->assertFalse(method_exists($control, 'setRQuote'));
	}
}
