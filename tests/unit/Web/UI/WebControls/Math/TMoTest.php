<?php

use Prado\Web\UI\WebControls\Math\TMo;
use Prado\Web\UI\WebControls\Math\TMathElement;
use Prado\Exceptions\TInvalidDataValueException;
use PHPUnit\Framework\TestCase;

class TMoTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testDefaultTagName()
	{
		$control = new TMo();
		$this->assertEquals('mo', $control->getDefaultTagName());
		$this->assertEquals('mo', $control->getTagName());
	}

	public function testExtendsTMathElement()
	{
		$this->assertInstanceOf(TMathElement::class, new TMo());
	}

	public function testDefaultsRenderNoDictionaryAttributes()
	{
		$control = new TMo();
		$control->getControls()->add('+');
		$this->assertEquals('', $control->getForm());
		$this->assertNull($control->getFence());
		$this->assertNull($control->getSeparator());
		$this->assertNull($control->getStretchy());
		$this->assertNull($control->getSymmetric());
		$this->assertNull($control->getLargeOp());
		$this->assertNull($control->getMovableLimits());
		$this->assertEquals('', $control->getLSpace());
		$this->assertEquals('', $control->getRSpace());
		$this->assertEquals('', $control->getMinSize());
		$this->assertEquals('', $control->getMaxSize());
		$output = $this->render($control);
		$this->assertStringContainsString('<mo', $output);
		foreach (['form', 'fence', 'separator', 'stretchy', 'symmetric', 'largeop', 'movablelimits', 'lspace', 'rspace', 'minsize', 'maxsize'] as $attr) {
			$this->assertStringNotContainsString($attr, $output);
		}
	}

	public function testFormValidValues()
	{
		foreach (['prefix', 'infix', 'postfix'] as $form) {
			$control = new TMo();
			$control->setForm($form);
			$this->assertEquals($form, $control->getForm());
			$this->assertStringContainsString('form="' . $form . '"', $this->render($control));
		}
	}

	public function testFormEmptyClears()
	{
		$control = new TMo();
		$control->setForm('prefix');
		$control->setForm('');
		$this->assertEquals('', $control->getForm());
	}

	public function testFormInvalidThrows()
	{
		$control = new TMo();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The <mo> Form 'sideways' must be 'prefix', 'infix', 'postfix', or empty.");
		$control->setForm('sideways');
	}

	public function testBooleanAttributesRenderTrueAndFalse()
	{
		$control = new TMo();
		$control->setFence(true);
		$control->setSeparator(false);
		$control->setStretchy(true);
		$control->setSymmetric(false);
		$control->setLargeOp(true);
		$control->setMovableLimits(false);
		$this->assertTrue($control->getFence());
		$this->assertFalse($control->getSeparator());
		$output = $this->render($control);
		$this->assertStringContainsString('fence="true"', $output);
		$this->assertStringContainsString('separator="false"', $output);
		$this->assertStringContainsString('stretchy="true"', $output);
		$this->assertStringContainsString('symmetric="false"', $output);
		$this->assertStringContainsString('largeop="true"', $output);
		$this->assertStringContainsString('movablelimits="false"', $output);
	}

	public function testBooleanAttributeAcceptsString()
	{
		$control = new TMo();
		$control->setStretchy('true');
		$this->assertTrue($control->getStretchy());
	}

	public function testEveryBooleanAttributeClears()
	{
		$control = new TMo();
		$control->setFence(true);
		$control->setSeparator(true);
		$control->setStretchy(true);
		$control->setSymmetric(true);
		$control->setLargeOp(true);
		$control->setMovableLimits(true);

		// '' clears back to the unset state.
		$control->setFence('');
		$control->setSeparator('');
		$control->setStretchy('');
		$control->setSymmetric('');
		$control->setLargeOp('');
		$control->setMovableLimits('');

		$this->assertNull($control->getFence());
		$this->assertNull($control->getSeparator());
		$this->assertNull($control->getStretchy());
		$this->assertNull($control->getSymmetric());
		$this->assertNull($control->getLargeOp());
		$this->assertNull($control->getMovableLimits());

		$output = $this->render($control);
		foreach (['fence', 'separator', 'stretchy', 'symmetric', 'largeop', 'movablelimits'] as $attr) {
			$this->assertStringNotContainsString($attr, $output);
		}
	}

	public function testStringAttributesRender()
	{
		$control = new TMo();
		$control->setLSpace('0.2em');
		$control->setRSpace('0.2em');
		$control->setMinSize('1.5em');
		$control->setMaxSize('3em');
		$output = $this->render($control);
		$this->assertStringContainsString('lspace="0.2em"', $output);
		$this->assertStringContainsString('rspace="0.2em"', $output);
		$this->assertStringContainsString('minsize="1.5em"', $output);
		$this->assertStringContainsString('maxsize="3em"', $output);
	}

	public function testHasNoMathVariant()
	{
		$this->assertFalse(method_exists(new TMo(), 'setMathVariant'));
	}

	public function testEveryBooleanAttributeClearsWithNull()
	{
		$control = new TMo();
		$control->setFence(true);
		$control->setSeparator(true);
		$control->setStretchy(true);
		$control->setSymmetric(true);
		$control->setLargeOp(true);
		$control->setMovableLimits(true);

		$control->setFence(null);
		$control->setSeparator(null);
		$control->setStretchy(null);
		$control->setSymmetric(null);
		$control->setLargeOp(null);
		$control->setMovableLimits(null);

		$this->assertNull($control->getFence());
		$this->assertNull($control->getSeparator());
		$this->assertNull($control->getStretchy());
		$this->assertNull($control->getSymmetric());
		$this->assertNull($control->getLargeOp());
		$this->assertNull($control->getMovableLimits());
	}

	public function testFormIsCaseInsensitive()
	{
		$control = new TMo();
		$control->setForm('PostFix');
		$this->assertSame('postfix', $control->getForm());
		$this->assertStringContainsString('form="postfix"', $this->render($control));
	}

	public function testStringAttributesCoerceToString()
	{
		$control = new TMo();
		$control->setLSpace(0);
		$control->setRSpace(0);
		$control->setMinSize(1);
		$control->setMaxSize(2);
		$this->assertSame('0', $control->getLSpace());
		$this->assertSame('0', $control->getRSpace());
		$this->assertSame('1', $control->getMinSize());
		$this->assertSame('2', $control->getMaxSize());
	}
}
