<?php

/**
 * TMunder class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;

/**
 * TMunder class
 *
 * TMunder represents the MathML `<munder>` element, which attaches an underscript
 * to a base. It takes exactly two children: the base followed by the underscript.
 *
 * Properties:
 * - <b>AccentUnder</b>, bool — whether the underscript is an accent (drawn close to
 *   the base) rather than a limit (drawn with a gap). Unset (the default) renders
 *   no attribute, so MathML decides from the underscript.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMunder extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'munder';
	}

	/**
	 * @return null|bool whether the underscript is an accent. Defaults to null (no attribute).
	 */
	public function getAccentUnder()
	{
		return $this->getViewState('AccentUnder', null);
	}

	/**
	 * @param null|bool|string $value whether the underscript is an accent; '' or null omits the attribute
	 */
	public function setAccentUnder($value)
	{
		$this->setViewState('AccentUnder', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * Adds attribute name-value pairs to renderer.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addBoolAttribute($writer, 'accentunder', $this->getAccentUnder());
	}
}
