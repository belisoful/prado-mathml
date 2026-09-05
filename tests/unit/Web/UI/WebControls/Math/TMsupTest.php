<?php

use Prado\Web\UI\WebControls\Math\TMsup;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMsupTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMsup();
		$this->assertEquals('msup', $control->getDefaultTagName());
		$this->assertEquals('msup', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMsup());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMsup());
		$this->assertStringContainsString('<msup', $output);
		$this->assertStringContainsString('</msup>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMsup();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<msup', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMsup();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMsup();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
