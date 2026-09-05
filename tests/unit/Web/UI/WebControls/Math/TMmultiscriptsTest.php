<?php

use Prado\Web\UI\WebControls\Math\TMmultiscripts;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMmultiscriptsTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMmultiscripts();
		$this->assertEquals('mmultiscripts', $control->getDefaultTagName());
		$this->assertEquals('mmultiscripts', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMmultiscripts());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMmultiscripts());
		$this->assertStringContainsString('<mmultiscripts', $output);
		$this->assertStringContainsString('</mmultiscripts>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMmultiscripts();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mmultiscripts', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMmultiscripts();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMmultiscripts();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
