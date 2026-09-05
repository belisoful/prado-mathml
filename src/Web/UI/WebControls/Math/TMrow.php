<?php

/**
 * TMrow class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMrow class
 *
 * TMrow represents the MathML `<mrow>` element, which groups any number of sub-expressions laid out horizontally.
 * The default tag is `mrow`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMrow extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mrow';
	}
}
