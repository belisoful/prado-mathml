<?php

use Prado\Web\UI\WebControls\Math\TMtd;
use Prado\Web\UI\WebControls\Math\TMathElement;
use Prado\Exceptions\TInvalidDataValueException;
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

	public function testNullClearsSpans()
	{
		$control = new TMtd();
		$control->setColumnSpan(2);
		$control->setRowSpan(3);
		$control->setColumnSpan(null);
		$control->setRowSpan(null);
		$this->assertNull($control->getColumnSpan());
		$this->assertNull($control->getRowSpan());
	}

	public function testSpanMinimums()
	{
		$control = new TMtd();
		$control->setColumnSpan(1);
		$control->setRowSpan('0');
		$this->assertSame(1, $control->getColumnSpan());
		$this->assertSame(0, $control->getRowSpan());
		$this->assertStringContainsString('rowspan="0"', $this->render($control));
	}

	public function testColumnSpanBelowOneThrows()
	{
		$control = new TMtd();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The <mtd> ColumnSpan '0' must be an integer of at least 1, or empty.");
		$control->setColumnSpan(0);
	}

	public function testNegativeRowSpanThrows()
	{
		$control = new TMtd();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The <mtd> RowSpan '-2' must be an integer of at least 0, or empty.");
		$control->setRowSpan(-2);
	}

	public function testNonIntegerSpanThrows()
	{
		$control = new TMtd();
		$this->expectException(TInvalidDataValueException::class);
		$control->setColumnSpan('abc');
	}
}
