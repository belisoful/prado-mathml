<?php

/**
 * TMtable class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMtable class
 *
 * TMtable represents the MathML `<mtable>` element, which represents a table or matrix.
 * The default tag is `mtable`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMtable extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mtable';
	}
}
