<?php

/**
 * TMn class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMn class
 *
 * TMn represents the MathML `<mn>` element, which represents a numeric literal.
 * The default tag is `mn`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMn extends TMathToken
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mn';
	}
}
