<?php

use Prado\Web\UI\WebControls\Math\TMroot;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMrootTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMroot();
		$this->assertEquals('mroot', $control->getDefaultTagName());
		$this->assertEquals('mroot', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMroot());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMroot());
		$this->assertStringContainsString('<mroot', $output);
		$this->assertStringContainsString('</mroot>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMroot();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mroot', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMroot();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMroot();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
