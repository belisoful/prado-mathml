<?php

use Prado\Web\UI\WebControls\Math\TMphantom;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMphantomTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMphantom();
		$this->assertEquals('mphantom', $control->getDefaultTagName());
		$this->assertEquals('mphantom', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMphantom());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMphantom());
		$this->assertStringContainsString('<mphantom', $output);
		$this->assertStringContainsString('</mphantom>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMphantom();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mphantom', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMphantom();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMphantom();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
