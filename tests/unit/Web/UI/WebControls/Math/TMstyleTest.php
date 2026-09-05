<?php

use Prado\Web\UI\WebControls\Math\TMstyle;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMstyleTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMstyle();
		$this->assertEquals('mstyle', $control->getDefaultTagName());
		$this->assertEquals('mstyle', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMstyle());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMstyle());
		$this->assertStringContainsString('<mstyle', $output);
		$this->assertStringContainsString('</mstyle>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMstyle();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mstyle', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMstyle();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMstyle();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
