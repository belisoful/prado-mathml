<?php

use Prado\Web\UI\WebControls\Math\TMpadded;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMpaddedTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMpadded();
		$this->assertEquals('mpadded', $control->getDefaultTagName());
		$this->assertEquals('mpadded', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMpadded());
	}

	public function testDefaultsRenderNoAttributes()
	{
		$control = new TMpadded();
		$this->assertEquals('', $control->getWidth());
		$this->assertEquals('', $control->getHeight());
		$this->assertEquals('', $control->getDepth());
		$this->assertEquals('', $control->getLSpace());
		$this->assertEquals('', $control->getVOffset());
		$output = $this->render($control);
		$this->assertStringContainsString('<mpadded', $output);
		foreach (['width', 'height', 'depth', 'lspace', 'voffset'] as $attr) {
			$this->assertStringNotContainsString($attr, $output);
		}
	}

	public function testSetAttributesRender()
	{
		$control = new TMpadded();
		$control->setWidth('+2px');
		$control->setHeight('1em');
		$control->setDepth('0');
		$control->setLSpace('3px');
		$control->setVOffset('-1px');
		$this->assertEquals('+2px', $control->getWidth());
		$this->assertEquals('1em', $control->getHeight());
		$this->assertEquals('0', $control->getDepth());
		$this->assertEquals('3px', $control->getLSpace());
		$this->assertEquals('-1px', $control->getVOffset());
		$output = $this->render($control);
		$this->assertStringContainsString('width="+2px"', $output);
		$this->assertStringContainsString('height="1em"', $output);
		$this->assertStringContainsString('depth="0"', $output);
		$this->assertStringContainsString('lspace="3px"', $output);
		$this->assertStringContainsString('voffset="-1px"', $output);
	}
}
