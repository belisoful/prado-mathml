<?php

use Prado\Web\UI\WebControls\Math\TMsub;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMsubTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMsub();
		$this->assertEquals('msub', $control->getDefaultTagName());
		$this->assertEquals('msub', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMsub());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMsub());
		$this->assertStringContainsString('<msub', $output);
		$this->assertStringContainsString('</msub>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMsub();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<msub', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMsub();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMsub();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
