<?php

/**
 * TMs class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMs class
 *
 * TMs represents the MathML `<ms>` element, a string literal. It renders its text
 * content between quotation marks, meant for strings inside expressions (for
 * example the argument of a computer-algebra function).
 *
 * Properties:
 * - <b>LQuote</b>, string — the opening quotation mark. Empty renders no attribute
 *   (the MathML default `"` applies).
 * - <b>RQuote</b>, string — the closing quotation mark. Empty renders no attribute.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMs extends TMathToken
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'ms';
	}

	/**
	 * @return string the opening quotation mark. Defaults to '' (no attribute).
	 */
	public function getLQuote()
	{
		return $this->getViewState('LQuote', '');
	}

	/**
	 * @param string $value the opening quotation mark, rendered as the `lquote` attribute
	 */
	public function setLQuote($value)
	{
		$this->setViewState('LQuote', $value, '');
	}

	/**
	 * @return string the closing quotation mark. Defaults to '' (no attribute).
	 */
	public function getRQuote()
	{
		return $this->getViewState('RQuote', '');
	}

	/**
	 * @param string $value the closing quotation mark, rendered as the `rquote` attribute
	 */
	public function setRQuote($value)
	{
		$this->setViewState('RQuote', $value, '');
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addStringAttribute($writer, 'lquote', $this->getLQuote());
		$this->addStringAttribute($writer, 'rquote', $this->getRQuote());
	}
}
