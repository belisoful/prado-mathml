<?php

use Prado\Web\UI\WebControls\Math\TMrow;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMrowTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMrow();
		$this->assertEquals('mrow', $control->getDefaultTagName());
		$this->assertEquals('mrow', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMrow());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMrow());
		$this->assertStringContainsString('<mrow', $output);
		$this->assertStringContainsString('</mrow>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMrow();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mrow', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMrow();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMrow();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
