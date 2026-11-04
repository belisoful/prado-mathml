<?php

use Prado\Web\UI\WebControls\Math\TMn;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMnTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMn();
		$this->assertEquals('mn', $control->getDefaultTagName());
		$this->assertEquals('mn', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMn());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMn());
		$this->assertStringContainsString('<mn', $output);
		$this->assertStringContainsString('</mn>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMn();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mn', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMn();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMn();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
