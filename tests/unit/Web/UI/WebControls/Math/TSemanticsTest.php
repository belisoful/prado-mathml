<?php

use Prado\Web\UI\WebControls\Math\TSemantics;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TSemanticsTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TSemantics();
		$this->assertEquals('semantics', $control->getDefaultTagName());
		$this->assertEquals('semantics', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathElement::class, new TSemantics());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TSemantics());
		$this->assertStringContainsString('<semantics', $output);
		$this->assertStringContainsString('</semantics>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TSemantics();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<semantics', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TSemantics();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TSemantics();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
