<?php

use Prado\Web\UI\WebControls\Math\TMsqrt;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMsqrtTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMsqrt();
		$this->assertEquals('msqrt', $control->getDefaultTagName());
		$this->assertEquals('msqrt', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMsqrt());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMsqrt());
		$this->assertStringContainsString('<msqrt', $output);
		$this->assertStringContainsString('</msqrt>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMsqrt();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<msqrt', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMsqrt();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMsqrt();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
