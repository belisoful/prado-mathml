<?php

/**
 * TMprescripts class file
 *
 * @author Brad Anderson <belisoful@icloud.com>
 * @link https://github.com/belisoful/prado-mathml
 * @license https://github.com/pradosoft/prado/blob/master/LICENSE
 */

namespace Prado\Web\UI\WebControls\Math;

/**
 * TMprescripts class
 *
 * TMprescripts represents the MathML `<mprescripts>` element, which separates the postscripts from the prescripts inside a `<mmultiscripts>`.
 * The default tag is `mprescripts`; it can be overridden at runtime through the
 * {@see setTagName TagName} property provided by {@see TMathElement}.
 *
 * @author Brad Anderson <belisoful@icloud.com>
 */
class TMprescripts extends TMathElement
{
	/**
	 * @return string the default tag name
	 */
	public function getDefaultTagName()
	{
		return 'mprescripts';
	}
}
