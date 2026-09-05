<?php

/**
 * TMathElement class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

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
 * Global attributes (`id`, `class`, `style`, `dir`, …) come from the base web
 * control. Subclasses that carry MathML-specific attributes add them by overriding
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
