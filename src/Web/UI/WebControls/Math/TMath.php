<?php

/**
 * TMath class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/pradosoft/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;
use Prado\Exceptions\TInvalidDataValueException;

/**
 * TMath class
 *
 * TMath represents the MathML `<math>` element, the top-level container of every
 * MathML expression. It is the only MathML element valid directly inside HTML
 * flow content; every other control in this extension is nested within it.
 *
 * Properties:
 * - <b>Display</b>, string — `inline` (the default rendering, laid out in a line
 *   of text) or `block` (laid out on its own, centered line). An empty string,
 *   the default, renders no `display` attribute. Any other value throws.
 *
 * Template usage:
 * ```html
 * <com:TMath Display="block">
 *     <com:TMfrac>
 *         <com:TMn>1</com:TMn>
 *         <com:TMn>2</com:TMn>
 *     </com:TMfrac>
 * </com:TMath>
 * ```
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMath extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'math';
	}

	/**
	 * @return string how the math is laid out: '', 'block', or 'inline'. Defaults to ''.
	 */
	public function getDisplay()
	{
		return $this->getViewState('Display', '');
	}

	/**
	 * Sets how the math is laid out, rendered as the `display` attribute.
	 * @param string $value '' (no attribute), 'block', or 'inline'
	 * @throws TInvalidDataValueException if the value is not one of the above
	 */
	public function setDisplay($value)
	{
		$value = TPropertyValue::ensureString($value);
		if ($value !== '' && $value !== 'block' && $value !== 'inline') {
			throw new TInvalidDataValueException('math_display_invalid', $value);
		}
		$this->setViewState('Display', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'display', $this->getDisplay());
	}
}
