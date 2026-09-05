<?php

use Prado\Web\UI\WebControls\Math\TAnnotation;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TAnnotationTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TAnnotation();
		$this->assertEquals('annotation', $control->getDefaultTagName());
		$this->assertEquals('annotation', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TAnnotation());
	}

	public function testEncodingDefaultRendersNoAttribute()
	{
		$control = new TAnnotation();
		$this->assertEquals('', $control->getEncoding());
		$output = $this->render($control);
		$this->assertStringContainsString('<annotation', $output);
		$this->assertStringNotContainsString('encoding', $output);
	}

	public function testSetEncodingRendersAttribute()
	{
		$control = new TAnnotation();
		$control->setEncoding('application/x-tex');
		$this->assertEquals('application/x-tex', $control->getEncoding());
		$output = $this->render($control);
		$this->assertStringContainsString('encoding="application/x-tex"', $output);
	}
}
