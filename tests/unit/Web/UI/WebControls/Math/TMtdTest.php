<?php

use Prado\Web\UI\WebControls\Math\TMtd;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TMtdTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMtd();
		$this->assertEquals('mtd', $control->getDefaultTagName());
		$this->assertEquals('mtd', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMtd());
	}

	public function testSpansDefaultNullAndRenderNoAttributes()
	{
		$control = new TMtd();
		$this->assertNull($control->getColumnSpan());
		$this->assertNull($control->getRowSpan());
		$output = $this->render($control);
		$this->assertStringContainsString('<mtd', $output);
		$this->assertStringNotContainsString('columnspan', $output);
		$this->assertStringNotContainsString('rowspan', $output);
	}

	public function testSetSpansRenderAttributes()
	{
		$control = new TMtd();
		$control->setColumnSpan(2);
		$control->setRowSpan('3');
		$this->assertSame(2, $control->getColumnSpan());
		$this->assertSame(3, $control->getRowSpan());
		$output = $this->render($control);
		$this->assertStringContainsString('columnspan="2"', $output);
		$this->assertStringContainsString('rowspan="3"', $output);
	}

	public function testClearSpans()
	{
		$control = new TMtd();
		$control->setColumnSpan(2);
		$control->setRowSpan(3);
		$control->setColumnSpan('');
		$control->setRowSpan('');
		$this->assertNull($control->getColumnSpan());
		$this->assertNull($control->getRowSpan());
	}
}
