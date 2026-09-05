<?php

use Prado\Web\UI\WebControls\Math\TMsubsup;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMsubsupTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMsubsup();
		$this->assertEquals('msubsup', $control->getDefaultTagName());
		$this->assertEquals('msubsup', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMsubsup());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMsubsup());
		$this->assertStringContainsString('<msubsup', $output);
		$this->assertStringContainsString('</msubsup>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMsubsup();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<msubsup', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMsubsup();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMsubsup();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
