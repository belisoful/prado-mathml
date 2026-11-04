<?php

/**
 * TMathElement class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

use Prado\Exceptions\TInvalidDataValueException;
use Prado\TPropertyValue;
use Prado\Web\UI\WebControls\THtmlElement;

/**
 * TMathElement class
 *
 * TMathElement is the common base for every MathML presentation control in this
 * extension. It extends {@see \Prado\Web\UI\WebControls\THtmlElement}, so each
 * concrete element renders through {@see \Prado\Web\UI\WebControls\TWebControl}:
 * the tag defaults to the element name returned by {@see getDefaultTagName} and
 * can be overridden at runtime with the {@see setTagName TagName} property (for a
 * theme, a template, or a {@see \Prado\Web\UI\WebControls\TWebControlDecorator}).
 *
 * The HTML global attributes (`id`, `class`, `style`, `dir`, `tabindex`, …) come
 * from the base web control. TMathElement adds the MathML Core global attributes,
 * valid on every MathML element:
 * - <b>DisplayStyle</b>, ?bool — `displaystyle`: true for display (block) layout,
 *   false for compact (inline) layout. Null, the default, renders no attribute.
 * - <b>ScriptLevel</b>, string — `scriptlevel`: an absolute level (`2`) or one
 *   relative to the inherited level (`+1`, `-1`). Any other value throws.
 * - <b>MathColor</b>, string — `mathcolor`: the text color, a CSS color.
 * - <b>MathBackground</b>, string — `mathbackground`: the background, a CSS color.
 * - <b>MathSize</b>, string — `mathsize`: the font size, a CSS length or percentage.
 *
 * An empty string, the default for each string property, renders no attribute.
 *
 * Subclasses that carry MathML-specific attributes add them by overriding
 * {@see addAttributesToRender} and calling the {@see addBoolAttribute} and
 * {@see addStringAttribute} helpers, which emit an attribute only when it has been
 * set — MathML boolean attributes render as the literal `true`/`false` values the
 * spec defines, not as HTML-style presence attributes.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
abstract class TMathElement extends THtmlElement
{
	/**
	 * @return ?bool whether the element is laid out in display style, or null when unset. Defaults to null.
	 */
	public function getDisplayStyle()
	{
		return $this->getViewState('DisplayStyle', null);
	}

	/**
	 * Sets the display style, rendered as the `displaystyle` attribute.
	 * @param null|bool|string $value true, false, or null or '' to render no attribute
	 */
	public function setDisplayStyle($value)
	{
		$this->setViewState('DisplayStyle', ($value === null || $value === '') ? null : TPropertyValue::ensureBoolean($value), null);
	}

	/**
	 * @return string the script level: '', an unsigned integer, or one signed with '+' or '-'. Defaults to ''.
	 */
	public function getScriptLevel()
	{
		return $this->getViewState('ScriptLevel', '');
	}

	/**
	 * Sets the script level, rendered as the `scriptlevel` attribute.
	 * @param int|string $value '' (no attribute), an absolute level such as `2`, or a relative one such as `+1` or `-1`
	 * @throws TInvalidDataValueException if the value is not one of the above
	 */
	public function setScriptLevel($value)
	{
		$value = TPropertyValue::ensureString($value);
		if ($value !== '' && !preg_match('/^[+-]?[0-9]+$/', $value)) {
			throw new TInvalidDataValueException('math_scriptlevel_invalid', $value);
		}
		$this->setViewState('ScriptLevel', $value, '');
	}

	/**
	 * @return string the text color. Defaults to '' (no attribute).
	 */
	public function getMathColor()
	{
		return $this->getViewState('MathColor', '');
	}

	/**
	 * @param string $value the text color, a CSS color, rendered as the `mathcolor` attribute
	 */
	public function setMathColor($value)
	{
		$this->setViewState('MathColor', TPropertyValue::ensureString($value), '');
	}

	/**
	 * @return string the background color. Defaults to '' (no attribute).
	 */
	public function getMathBackground()
	{
		return $this->getViewState('MathBackground', '');
	}

	/**
	 * @param string $value the background color, a CSS color, rendered as the `mathbackground` attribute
	 */
	public function setMathBackground($value)
	{
		$this->setViewState('MathBackground', TPropertyValue::ensureString($value), '');
	}

	/**
	 * @return string the font size. Defaults to '' (no attribute).
	 */
	public function getMathSize()
	{
		return $this->getViewState('MathSize', '');
	}

	/**
	 * @param string $value the font size, a CSS length or percentage, rendered as the `mathsize` attribute
	 */
	public function setMathSize($value)
	{
		$this->setViewState('MathSize', TPropertyValue::ensureString($value), '');
	}

	/**
	 * Adds the MathML global attributes to the renderer, after the HTML ones.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);
		$this->addBoolAttribute($writer, 'displaystyle', $this->getDisplayStyle());
		$this->addStringAttribute($writer, 'scriptlevel', $this->getScriptLevel());
		$this->addStringAttribute($writer, 'mathcolor', $this->getMathColor());
		$this->addStringAttribute($writer, 'mathbackground', $this->getMathBackground());
		$this->addStringAttribute($writer, 'mathsize', $this->getMathSize());
	}

	/**
	 * Adds a MathML boolean attribute, rendered as the literal `true` or `false`.
	 *
	 * A `null` value leaves the attribute unwritten, so the element keeps the
	 * default the MathML user-agent stylesheet defines for it.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 * @param string $name the attribute name
	 * @param null|bool $value the attribute value, or null to omit the attribute
	 */
	protected function addBoolAttribute($writer, string $name, ?bool $value): void
	{
		if ($value !== null) {
			$writer->addAttribute($name, $value ? 'true' : 'false');
		}
	}

	/**
	 * Adds a MathML string attribute, omitting it when the value is empty.
	 * @param \Prado\Web\UI\THtmlWriter $writer the writer used for the rendering purpose
	 * @param string $name the attribute name
	 * @param string $value the attribute value; an empty string omits the attribute
	 */
	protected function addStringAttribute($writer, string $name, string $value): void
	{
		if ($value !== '') {
			$writer->addAttribute($name, $value);
		}
	}
}
