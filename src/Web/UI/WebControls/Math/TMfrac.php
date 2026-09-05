<?php

/**
 * TMfrac class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMfrac class
 *
 * TMfrac represents the MathML `<mfrac>` element, a fraction. It takes exactly two
 * child expressions: the numerator followed by the denominator.
 *
 * Properties:
 * - <b>LineThickness</b>, string — the thickness of the fraction bar (a MathML
 *   length, or `0` for no bar, as in a binomial coefficient). Empty renders no
 *   attribute, so the default rule thickness applies.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMfrac extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mfrac';
	}

	/**
	 * @return string the fraction-bar thickness. Defaults to '' (no attribute).
	 */
	public function getLineThickness()
	{
		return $this->getViewState('LineThickness', '');
	}

	/**
	 * @param string $value the fraction-bar thickness (a MathML length), rendered as `linethickness`
	 */
	public function setLineThickness($value)
	{
		$this->setViewState('LineThickness', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'linethickness', $this->getLineThickness());
	}
}
