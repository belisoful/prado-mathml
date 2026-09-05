<?php

/**
 * TMi class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMi class
 *
 * TMi represents the MathML `<mi>` element, which represents an identifier, such as a variable or a function name.
 * The default tag is `mi`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMi extends TMathToken
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mi';
	}
}
