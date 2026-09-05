<?php

use Prado\Web\UI\WebControls\Math\TMtr;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMtrTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMtr();
		$this->assertEquals('mtr', $control->getDefaultTagName());
		$this->assertEquals('mtr', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMtr());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMtr());
		$this->assertStringContainsString('<mtr', $output);
		$this->assertStringContainsString('</mtr>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMtr();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mtr', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMtr();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMtr();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
