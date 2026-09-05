<?php

/**
 * TMo class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;
use Prado\Exceptions\TInvalidDataValueException;

/**
 * TMo class
 *
 * TMo represents the MathML `<mo>` element, an operator, fence, separator, or
 * accent. Its content is the operator text (`+`, `=`, `(`, an integral sign, …).
 * MathML gives every operator defaults from its built-in operator dictionary;
 * each property below overrides one of those, and is rendered only when set so
 * the dictionary default otherwise stands.
 *
 * Properties:
 * - <b>Form</b>, string — `prefix`, `infix`, or `postfix`, selecting which
 *   dictionary entry applies. Empty (the default) renders no attribute. Other
 *   values throw.
 * - <b>Fence</b>, bool — whether the operator is a fence (a bracket).
 * - <b>Separator</b>, bool — whether the operator is a separator (a comma).
 * - <b>Stretchy</b>, bool — whether the operator stretches to its context's size.
 * - <b>Symmetric</b>, bool — whether a stretchy operator is symmetric about the axis.
 * - <b>LargeOp</b>, bool — whether the operator is drawn larger in display style.
 * - <b>MovableLimits</b>, bool — whether under/over scripts move to sub/superscript
 *   position in inline style.
 * - <b>LSpace</b>/<b>RSpace</b>, string — the space before/after the operator.
 * - <b>MinSize</b>/<b>MaxSize</b>, string — bounds on a stretchy operator's size.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMo extends TMathToken
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mo';
	}

	/**
	 * @return string the operator form: '', 'prefix', 'infix', or 'postfix'. Defaults to ''.
	 */
	public function getForm()
	{
		return $this->getViewState('Form', '');
	}

	/**
	 * Sets the operator form, rendered as the `form` attribute.
	 * @param string $value '' (no attribute), 'prefix', 'infix', or 'postfix'
	 * @throws TInvalidDataValueException if the value is not one of the above
	 */
	public function setForm($value)
	{
		$value = TPropertyValue::ensureString($value);
		if ($value !== '' && $value !== 'prefix' && $value !== 'infix' && $value !== 'postfix') {
			throw new TInvalidDataValueException('math_operator_form_invalid', $value);
		}
		$this->setViewState('Form', $value, '');
	}

	/**
	 * @return null|bool whether the operator is a fence. Defaults to null (no attribute).
	 */
	public function getFence()
	{
		return $this->getViewState('Fence', null);
	}

	/**
	 * @param null|bool|string $value whether the operator is a fence; '' or null omits the attribute
	 */
	public function setFence($value)
	{
		$this->setViewState('Fence', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return null|bool whether the operator is a separator. Defaults to null (no attribute).
	 */
	public function getSeparator()
	{
		return $this->getViewState('Separator', null);
	}

	/**
	 * @param null|bool|string $value whether the operator is a separator; '' or null omits the attribute
	 */
	public function setSeparator($value)
	{
		$this->setViewState('Separator', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return null|bool whether the operator stretches to its context. Defaults to null (no attribute).
	 */
	public function getStretchy()
	{
		return $this->getViewState('Stretchy', null);
	}

	/**
	 * @param null|bool|string $value whether the operator stretches; '' or null omits the attribute
	 */
	public function setStretchy($value)
	{
		$this->setViewState('Stretchy', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return null|bool whether a stretchy operator is symmetric. Defaults to null (no attribute).
	 */
	public function getSymmetric()
	{
		return $this->getViewState('Symmetric', null);
	}

	/**
	 * @param null|bool|string $value whether a stretchy operator is symmetric; '' or null omits the attribute
	 */
	public function setSymmetric($value)
	{
		$this->setViewState('Symmetric', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return null|bool whether the operator is drawn as a large operator. Defaults to null (no attribute).
	 */
	public function getLargeOp()
	{
		return $this->getViewState('LargeOp', null);
	}

	/**
	 * @param null|bool|string $value whether the operator is a large operator; '' or null omits the attribute
	 */
	public function setLargeOp($value)
	{
		$this->setViewState('LargeOp', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return null|bool whether under/over scripts become sub/superscripts inline. Defaults to null.
	 */
	public function getMovableLimits()
	{
		return $this->getViewState('MovableLimits', null);
	}

	/**
	 * @param null|bool|string $value whether limits are movable; '' or null omits the attribute
	 */
	public function setMovableLimits($value)
	{
		$this->setViewState('MovableLimits', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return string the space before the operator. Defaults to '' (no attribute).
	 */
	public function getLSpace()
	{
		return $this->getViewState('LSpace', '');
	}

	/**
	 * @param string $value the space before the operator (a MathML length); '' omits the attribute
	 */
	public function setLSpace($value)
	{
		$this->setViewState('LSpace', $value, '');
	}

	/**
	 * @return string the space after the operator. Defaults to '' (no attribute).
	 */
	public function getRSpace()
	{
		return $this->getViewState('RSpace', '');
	}

	/**
	 * @param string $value the space after the operator (a MathML length); '' omits the attribute
	 */
	public function setRSpace($value)
	{
		$this->setViewState('RSpace', $value, '');
	}

	/**
	 * @return string the minimum size of a stretchy operator. Defaults to '' (no attribute).
	 */
	public function getMinSize()
	{
		return $this->getViewState('MinSize', '');
	}

	/**
	 * @param string $value the minimum size (a MathML length); '' omits the attribute
	 */
	public function setMinSize($value)
	{
		$this->setViewState('MinSize', $value, '');
	}

	/**
	 * @return string the maximum size of a stretchy operator. Defaults to '' (no attribute).
	 */
	public function getMaxSize()
	{
		return $this->getViewState('MaxSize', '');
	}

	/**
	 * @param string $value the maximum size (a MathML length); '' omits the attribute
	 */
	public function setMaxSize($value)
	{
		$this->setViewState('MaxSize', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'form', $this->getForm());
		$this->addBoolAttribute($writer, 'fence', $this->getFence());
		$this->addBoolAttribute($writer, 'separator', $this->getSeparator());
		$this->addBoolAttribute($writer, 'stretchy', $this->getStretchy());
		$this->addBoolAttribute($writer, 'symmetric', $this->getSymmetric());
		$this->addBoolAttribute($writer, 'largeop', $this->getLargeOp());
		$this->addBoolAttribute($writer, 'movablelimits', $this->getMovableLimits());
		$this->addStringAttribute($writer, 'lspace', $this->getLSpace());
		$this->addStringAttribute($writer, 'rspace', $this->getRSpace());
		$this->addStringAttribute($writer, 'minsize', $this->getMinSize());
		$this->addStringAttribute($writer, 'maxsize', $this->getMaxSize());
	}
}
