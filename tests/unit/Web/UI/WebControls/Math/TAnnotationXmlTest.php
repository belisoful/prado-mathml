<?php

use Prado\Web\UI\WebControls\Math\TAnnotationXml;
use Prado\Web\UI\WebControls\Math\TMathElement;
use PHPUnit\Framework\TestCase;

class TAnnotationXmlTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TAnnotationXml();
		$this->assertEquals('annotation-xml', $control->getDefaultTagName());
		$this->assertEquals('annotation-xml', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TAnnotationXml());
	}

	public function testRendersHyphenatedTag()
	{
		$output = $this->render(new TAnnotationXml());
		$this->assertStringContainsString('<annotation-xml', $output);
		$this->assertStringContainsString('</annotation-xml>', $output);
	}

	public function testEncodingDefaultRendersNoAttribute()
	{
		$control = new TAnnotationXml();
		$this->assertEquals('', $control->getEncoding());
		$this->assertStringNotContainsString('encoding', $this->render($control));
	}

	public function testSetEncodingRendersAttribute()
	{
		$control = new TAnnotationXml();
		$control->setEncoding('MathML-Content');
		$this->assertEquals('MathML-Content', $control->getEncoding());
		$output = $this->render($control);
		$this->assertStringContainsString('encoding="MathML-Content"', $output);
	}
}
