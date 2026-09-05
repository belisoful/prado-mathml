<?php

use Prado\Web\UI\WebControls\Math\TMerror;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMerrorTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMerror();
		$this->assertEquals('merror', $control->getDefaultTagName());
		$this->assertEquals('merror', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMerror());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMerror());
		$this->assertStringContainsString('<merror', $output);
		$this->assertStringContainsString('</merror>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMerror();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<merror', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMerror();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMerror();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
