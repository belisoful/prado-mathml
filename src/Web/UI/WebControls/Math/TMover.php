<?php

/**
 * TMover class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;

/**
 * TMover class
 *
 * TMover represents the MathML `<mover>` element, which attaches an overscript to a
 * base. It takes exactly two children: the base followed by the overscript.
 *
 * Properties:
 * - <b>Accent</b>, bool — whether the overscript is an accent (drawn close to the
 *   base) rather than a limit (drawn with a gap). Unset (the default) renders no
 *   attribute, so MathML decides from the overscript.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMover extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mover';
	}

	/**
	 * @return null|bool whether the overscript is an accent. Defaults to null (no attribute).
	 */
	public function getAccent()
	{
		return $this->getViewState('Accent', null);
	}

	/**
	 * @param null|bool|string $value whether the overscript is an accent; '' or null omits the attribute
	 */
	public function setAccent($value)
	{
		$this->setViewState('Accent', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addBoolAttribute($writer, 'accent', $this->getAccent());
	}
}
