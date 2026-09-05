<?php

use Prado\Web\UI\WebControls\Math\TMprescripts;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMprescriptsTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMprescripts();
		$this->assertEquals('mprescripts', $control->getDefaultTagName());
		$this->assertEquals('mprescripts', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMprescripts());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMprescripts());
		$this->assertStringContainsString('<mprescripts', $output);
		$this->assertStringContainsString('</mprescripts>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMprescripts();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mprescripts', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMprescripts();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMprescripts();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
