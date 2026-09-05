<?php

use Prado\Web\UI\WebControls\Math\TMtable;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMtableTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMtable();
		$this->assertEquals('mtable', $control->getDefaultTagName());
		$this->assertEquals('mtable', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TMtable());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMtable());
		$this->assertStringContainsString('<mtable', $output);
		$this->assertStringContainsString('</mtable>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMtable();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mtable', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMtable();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMtable();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
