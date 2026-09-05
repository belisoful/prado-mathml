<?php

/**
 * TMphantom class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMphantom class
 *
 * TMphantom represents the MathML `<mphantom>` element, which renders its contents invisibly while preserving their size.
 * The default tag is `mphantom`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMphantom extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mphantom';
	}
}
