<?php

use Prado\Web\UI\WebControls\Math\TMathElement;
use Prado\Web\UI\WebControls\Math\TMrow;
use Prado\Web\UI\WebControls\Math\TMstyle;
use Prado\Exceptions\TInvalidDataValueException;
use PHPUnit\Framework\TestCase;

/**
 * Covers the MathML Core global attributes TMathElement gives every element,
 * through concrete subclasses.
 */
class TMathElementTest extends TestCase
{
	use TWebControlRenderTrait;

	public function testIsAbstract()
	{
		$this->assertTrue((new ReflectionClass(TMathElement::class))->isAbstract());
	}

	public function testGlobalsDefaultUnsetAndRenderNoAttributes()
	{
		$control = new TMrow();
		$this->assertNull($control->getDisplayStyle());
		$this->assertSame('', $control->getScriptLevel());
		$this->assertSame('', $control->getMathColor());
		$this->assertSame('', $control->getMathBackground());
		$this->assertSame('', $control->getMathSize());
		$this->assertSame('<mrow></mrow>', $this->render($control));
	}

	public function testGlobalsRender()
	{
		$control = new TMstyle();
		$control->setDisplayStyle(true);
		$control->setScriptLevel('+1');
		$control->setMathColor('darkblue');
		$control->setMathBackground('#ffeeee');
		$control->setMathSize('120%');
		$output = $this->render($control);
		$this->assertStringContainsString('displaystyle="true"', $output);
		$this->assertStringContainsString('scriptlevel="+1"', $output);
		$this->assertStringContainsString('mathcolor="darkblue"', $output);
		$this->assertStringContainsString('mathbackground="#ffeeee"', $output);
		$this->assertStringContainsString('mathsize="120%"', $output);
	}

	public function testDisplayStyleFalseAndString()
	{
		$control = new TMrow();
		$control->setDisplayStyle('false');
		$this->assertFalse($control->getDisplayStyle());
		$this->assertStringContainsString('displaystyle="false"', $this->render($control));
	}

	public function testDisplayStyleClears()
	{
		$control = new TMrow();
		$control->setDisplayStyle(true);
		$control->setDisplayStyle('');
		$this->assertNull($control->getDisplayStyle());
		$control->setDisplayStyle(true);
		$control->setDisplayStyle(null);
		$this->assertNull($control->getDisplayStyle());
	}

	public function testScriptLevelValidForms()
	{
		$control = new TMrow();
		foreach (['0', '2', '+1', '-1'] as $level) {
			$control->setScriptLevel($level);
			$this->assertSame($level, $control->getScriptLevel());
		}
		$control->setScriptLevel(3);
		$this->assertSame('3', $control->getScriptLevel());
		$control->setScriptLevel('');
		$this->assertSame('', $control->getScriptLevel());
	}

	public function testScriptLevelInvalidThrows()
	{
		$control = new TMrow();
		$this->expectException(TInvalidDataValueException::class);
		$this->expectExceptionMessage("The ScriptLevel 'big' must be an integer, optionally signed with '+' or '-', or empty.");
		$control->setScriptLevel('big');
	}

	public function testStringGlobalsCoerceAndClear()
	{
		$control = new TMrow();
		$control->setMathSize(2);
		$this->assertSame('2', $control->getMathSize());
		$control->setMathColor('red');
		$control->setMathBackground('blue');
		$control->setMathColor(null);
		$control->setMathBackground('');
		$control->setMathSize(null);
		$this->assertSame('<mrow></mrow>', $this->render($control));
	}

	public function testElementAttributesFollowGlobals()
	{
		$control = new \Prado\Web\UI\WebControls\Math\TMath();
		$control->setMathColor('red');
		$control->setDisplay('block');
		$this->assertSame('<math mathcolor="red" display="block"></math>', $this->render($control));
	}
}
