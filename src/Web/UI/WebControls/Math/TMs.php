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
 * TMs represents the MathML `<ms>` element, a string literal, meant for strings
 * inside expressions (for example the argument of a computer-algebra function).
 *
 * MathML Core no longer supports the `lquote` and `rquote` attributes, and draws
 * no quotation marks of its own: write any quotes as part of the text content.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMs extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'ms';
	}
}
