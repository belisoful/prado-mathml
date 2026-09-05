<?php

/**
 * TMerror class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMerror class
 *
 * TMerror represents the MathML `<merror>` element, which encloses a message that a MathML processor emits on an error.
 * The default tag is `merror`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMerror extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'merror';
	}
}
