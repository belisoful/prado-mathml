<?php

use Prado\Web\UI\WebControls\Math\TMtext;
use Prado\Web\UI\WebControls\Math\TMathToken;
use PHPUnit\Framework\TestCase;

class TMtextTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMtext();
		$this->assertEquals('mtext', $control->getDefaultTagName());
		$this->assertEquals('mtext', $control->getTagName());
	}

	public function testExtendsBase()
	{
		$this->assertInstanceOf(TMathToken::class, new TMtext());
	}

	public function testRendersTag()
	{
		$output = $this->render(new TMtext());
		$this->assertStringContainsString('<mtext', $output);
		$this->assertStringContainsString('</mtext>', $output);
	}

	public function testSetTagNameOverridesDefault()
	{
		$control = new TMtext();
		$control->setTagName('div');
		$this->assertEquals('div', $control->getTagName());
		$this->assertTrue($control->getIsMutated());
		$output = $this->render($control);
		$this->assertStringContainsString('<div', $output);
		$this->assertStringNotContainsString('<mtext', $output);
	}

	public function testRendersChildContent()
	{
		$control = new TMtext();
		$control->getControls()->add('inner-content');
		$output = $this->render($control);
		$this->assertStringContainsString('inner-content', $output);
	}

	public function testRendersCssClassAttribute()
	{
		$control = new TMtext();
		$control->setCssClass('mml');
		$output = $this->render($control);
		$this->assertStringContainsString('class="mml"', $output);
	}
}
