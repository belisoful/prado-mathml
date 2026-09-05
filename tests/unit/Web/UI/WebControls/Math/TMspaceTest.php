<?php

use Prado\Web\UI\WebControls\Math\TMspace;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMspaceTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMspace();
		$this->assertEquals('mspace', $control->getDefaultTagName());
		$this->assertEquals('mspace', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMspace());
	}

	public function testDefaultsRenderNoSizeAttributes()
	{
		$control = new TMspace();
		$this->assertEquals('', $control->getWidth());
		$this->assertEquals('', $control->getHeight());
		$this->assertEquals('', $control->getDepth());
		$output = $this->render($control);
		$this->assertStringContainsString('<mspace', $output);
		$this->assertStringNotContainsString('width', $output);
		$this->assertStringNotContainsString('height', $output);
		$this->assertStringNotContainsString('depth', $output);
	}

	public function testSetSizesRenderAttributes()
	{
		$control = new TMspace();
		$control->setWidth('1em');
		$control->setHeight('0.5em');
		$control->setDepth('0.25em');
		$this->assertEquals('1em', $control->getWidth());
		$this->assertEquals('0.5em', $control->getHeight());
		$this->assertEquals('0.25em', $control->getDepth());
		$output = $this->render($control);
		$this->assertStringContainsString('width="1em"', $output);
		$this->assertStringContainsString('height="0.5em"', $output);
		$this->assertStringContainsString('depth="0.25em"', $output);
	}
}
