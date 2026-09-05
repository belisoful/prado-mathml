<?php

use Prado\Web\UI\WebControls\Math\TMs;
use Prado\Web\UI\WebControls\Math\TMathToken;
use PHPUnit\Framework\TestCase;

class TMsTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMs();
		$this->assertEquals('ms', $control->getDefaultTagName());
		$this->assertEquals('ms', $control->getTagName());
	}

	public function testExtendsTMathToken()
	{
		$this->assertInstanceOf(TMathToken::class, new TMs());
	}

	public function testDefaultsRenderNoQuoteAttributes()
	{
		$control = new TMs();
		$this->assertEquals('', $control->getLQuote());
		$this->assertEquals('', $control->getRQuote());
		$output = $this->render($control);
		$this->assertStringContainsString('<ms', $output);
		$this->assertStringNotContainsString('lquote', $output);
		$this->assertStringNotContainsString('rquote', $output);
	}

	public function testSetQuotesRenderAttributes()
	{
		$control = new TMs();
		$control->setLQuote('«');
		$control->setRQuote('»');
		$this->assertEquals('«', $control->getLQuote());
		$this->assertEquals('»', $control->getRQuote());
		$output = $this->render($control);
		$this->assertStringContainsString('lquote="«"', $output);
		$this->assertStringContainsString('rquote="»"', $output);
	}
}
