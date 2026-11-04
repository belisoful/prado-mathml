<?php

/**
 * TMi class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\Exceptions\TInvalidDataValueException;
use Prado\TPropertyValue;

/**
 * TMi class
 *
 * TMi represents the MathML `<mi>` element, which represents an identifier, such as a variable or a function name.
 * The default tag is `mi`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * A single-character identifier renders in italic by default.
 *
 * Properties:
 * - <b>MathVariant</b>, string — `normal` renders the identifier upright instead,
 *   matched without regard to case and stored lowercase. An empty string, the
 *   default, renders no `mathvariant` attribute. MathML Core defines no other
 *   value, and any other value throws; style other text with CSS.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMi extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mi';
	}

	/**
	 * @return string the mathematical font variant: '' or 'normal'. Defaults to ''.
	 */
	public function getMathVariant()
	{
		return $this->getViewState('MathVariant', '');
	}

	/**
	 * Sets the mathematical font variant, rendered as the `mathvariant` attribute.
	 * @param string $value '' (no attribute) or 'normal', in any case
	 * @throws TInvalidDataValueException if the value is not one of the above
	 */
	public function setMathVariant($value)
	{
		$value = strtolower(TPropertyValue::ensureString($value));
		if ($value !== '' && $value !== 'normal') {
			throw new TInvalidDataValueException('math_identifier_variant_invalid', $value);
		}
		$this->setViewState('MathVariant', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'mathvariant', $this->getMathVariant());
	}
}
