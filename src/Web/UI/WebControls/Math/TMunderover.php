<?php

/**
 * TMunderover class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\TPropertyValue;

/**
 * TMunderover class
 *
 * TMunderover represents the MathML `<munderover>` element, which attaches both an
 * underscript and an overscript to a base. It takes exactly three children: the
 * base, the underscript, then the overscript.
 *
 * Properties:
 * - <b>AccentUnder</b>, bool — whether the underscript is an accent. Unset (the
 *   default) renders no attribute.
 * - <b>Accent</b>, bool — whether the overscript is an accent. Unset (the default)
 *   renders no attribute.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMunderover extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'munderover';
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
		$this->addBoolAttribute($writer, 'accentunder', $this->getAccentUnder());
		$this->addBoolAttribute($writer, 'accent', $this->getAccent());
	}
}
